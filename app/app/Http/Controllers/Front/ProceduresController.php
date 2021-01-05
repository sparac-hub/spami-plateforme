<?php

namespace App\Http\Controllers\Front;

use App\Models\Cms\Aspim;
use App\Models\Cms\AspimTranslation;
use App\Models\Cms\Procedure;
use App\Models\Cms\Menu;
use Illuminate\Http\Request;
use App\Models\Cms\ProcedureCategory;
use Spatie\MediaLibrary\Models\Media;

class ProceduresController extends CmsFrontController
{
    /**
     * @param Request $request
     * @return Response
     */
    public function index(Request $request, Menu $menu)
    {
        $procedures = Procedure::frontFilter($request, $menu->id);

        $procedure_categories = ProcedureCategory::whereIsActive(true)
            ->whereMenuId($menu->id)
            ->withTranslation()
            ->whereHas('procedures', function ($query) use ($menu) {
                $query->whereMenuId($menu->id)->whereIsActive(true);
            })
            ->orderBy('order')
            ->get();

        $aspim = AspimTranslation::where('locale', locale())->orderBy('name')->get();

        if ($request->ajax() || $request->wantsJson()) {
            $view_list = view(front_dir() . '.procedures.partials.list_index', compact('procedures'))->render();
            return response()->json(['data' => true, 'view_list' => $view_list, 'aspim' => $aspim]);
        }

        return view(front_dir() . '.procedures.index', compact('procedures', 'procedure_categories', 'menu', 'aspim'));
    }

    /**
     * @param string $slug
     * @return  Response
     */
    public function show($slug)
    {
        $procedure = Procedure::whereIsActive(true)
            ->with(['translations', 'menu'])
            ->whereHas('translations', function ($query) use ($slug) {
                $query->whereSlug($slug)->whereLocale(locale());
            })
            ->firstOrFail();

        return view(front_dir() . '.procedures.show', compact('procedure'));
    }

    /**
     * Show Procedure Category and list all active items under this category
     */
    public function category($menu_slug, $category)
    {
        $menu = $this->getMenuFromSlug($menu_slug);

        $procedures = Procedure::whereHas('category.translations', function ($query) use ($category) {
            $query->whereSlug($category);
        })->frontFilter(request(), $menu->id);

        $procedure_categories = ProcedureCategory::whereIsActive(true)
            ->whereMenuId($menu->id)
            ->withTranslation()
            ->whereHas('procedures', function ($query) use ($menu) {
                $query->whereMenuId($menu->id)->whereIsActive(true);
            })
            ->orderBy('order')
            ->get();

        return view(front_dir() . '.procedures.index', compact('procedures', 'procedure_categories', 'menu'));
    }

    public function download($mediaItem)
    {
        $media = Media::where('id', $mediaItem)->first();

        return response()->download($media->getPath(), $media->procedure_name);
    }
}
