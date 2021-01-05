<?php

namespace App\Http\Controllers\Front;

use App\Models\Cms\Menu;
use Illuminate\Http\Request;
use App\Models\Cms\MediaAlbum;
use Spatie\MediaLibrary\Models\Media;

class MediaFilesController extends CmsFrontController
{
    /**
     * @param Request $request
     * @return Response
     */
    public function index(Request $request, Menu $menu)
    {
        $media_albums = MediaAlbum::where([
            'is_active' => 1,
            'menu_id' => $menu->id,
        ])
            ->withTranslation()
            ->with(['menu'])
            ->paginate(config('cms.front_pagination.media')); // Todo make this variable files per page

        return view(front_dir() . '.media_files.index', compact('media_albums', 'menu'));
    }

    /**
     * @param string $slug
     * @return  Response
     */
    public function show($slug)
    {
        $media_album = MediaAlbum::whereIsActive(true)
            ->with(['translations', 'menu'])
            ->whereHas('translations', function ($query) use ($slug) {
                $query->whereSlug($slug)->whereLocale(locale());
            })
            ->firstOrFail();

        return view(front_dir() . '.media_files.show', compact('media_album'));
    }

    /**
     * Show MediaFile Category and list all active items under this category
     */
    public function category($menu_slug, $category)
    {
        $menu = $this->getMenuFromSlug($menu_slug);

        $media_files = MediaAlbum::whereHas('category.translations', function ($query) use ($category) {
            $query->whereSlug($category);
        })
            ->where([
                'is_active' => 1,
                'menu_id' => $menu->id,
            ])
            ->withTranslation()
            ->with(['menu'])
            ->paginate(config('cms.front_pagination.media')); // Todo make this variable media_files per page

        return view(front_dir() . '.media_files.index', compact('media_files', 'menu'));
    }

    public function download($mediaItem)
    {
        $media = Media::where('id', $mediaItem)->first();

        return response()->download($media->getPath(), $media->file_name);
    }
}
