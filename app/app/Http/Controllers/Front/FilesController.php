<?php

namespace App\Http\Controllers\Front;

use App\Models\Cms\File;
use App\Models\Cms\Menu;
use Illuminate\Http\Request;
use App\Models\Cms\FileCategory;
use Spatie\MediaLibrary\Models\Media;

class FilesController extends CmsFrontController
{
    /**
     * @param Request $request
     * @return Response
     */
    public function index(Request $request, Menu $menu)
    {
        $files = File::frontFilter($request, $menu->id);

        $file_categories = FileCategory::whereIsActive(true)
            ->whereMenuId($menu->id)
            ->withTranslation()
            ->whereHas('files', function ($query) use ($menu) {
                $query->whereMenuId($menu->id)->whereIsActive(true);
            })
            ->orderBy('order')
            ->get();

        return view(front_dir() . '.files.index', compact('files', 'file_categories', 'menu'));
    }

    /**
     * @param string $slug
     * @return  Response
     */
    public function show($slug)
    {
        $file = File::whereIsActive(true)
            ->with(['translations', 'menu'])
            ->whereHas('translations', function ($query) use ($slug) {
                $query->whereSlug($slug)->whereLocale(locale());
            })
            ->firstOrFail();

        return view(front_dir() . '.files.show', compact('file'));
    }

    /**
     * Show File Category and list all active items under this category
     */
    public function category($menu_slug, $category)
    {
        $menu = $this->getMenuFromSlug($menu_slug);

        $files = File::whereHas('category.translations', function ($query) use ($category) {
            $query->whereSlug($category);
        })
            ->where([
                'is_active' => 1,
                'menu_id' => $menu->id,
            ])
            ->withTranslation()
            ->with(['menu'])
            ->paginate(config('cms.front_pagination.files')); // Todo make this variable files per page

        return view(front_dir() . '.files.index', compact('files', 'menu'));
    }

    public function download($mediaItem)
    {
        $media = Media::where('id', $mediaItem)->first();

        return response()->download($media->getPath(), $media->file_name);
    }
}
