<?php

namespace App\Http\Controllers\Front;

use App\Models\Cms\Aspim;
use App\Models\Cms\AspimTranslation;
use App\Models\Cms\OutilGestion;
use Illuminate\Http\Request;
use App\Models\Cms\OutilGestionCategory;

class OutilGestionsController extends CmsFrontController
{
    /**
     * @param Request $request
     * @param $menu_slug
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request, $menu)
    {
        $outil_gestions = OutilGestion::frontFilter($request, $menu->id);

        if ($request->ajax()) {
            $view_list = view(front_dir() . '.outil_gestions.partials.list_index', compact('outil_gestions'))->render();
            return response()->json(['resultat' => true, 'view_list' => $view_list]);
        }

        $outil_gestion_categories = OutilGestionCategory::whereIsActive(true)
            ->whereMenuId($menu->id)
            ->withTranslation()
            ->get();

        $aspims = AspimTranslation::where('locale', locale())->orderBy('name')->get();

        return view(front_dir() . '.outil_gestions.index', compact('outil_gestions', 'outil_gestion_categories', 'aspims', 'menu'));
    }

    /**
     * @param int $slug
     * @return  Response
     */
    public function show($slug)
    {
        $outil_gestion = OutilGestion::whereIsActive(true)
            ->with(['translations', 'menu'])
            ->whereHas('translations', function ($query) use ($slug) {
                $query->whereSlug($slug)->whereLocale(locale());
            })
            ->firstOrFail();

        $menu = $outil_gestion->menu;

        return view(front_dir() . '.outil_gestions.show', compact('outil_gestion', 'menu'));
    }

    /**
     * Show OutilGestion Category and list all active items under this category
     * @param string $menu_slug
     * @param string $category
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function category(string $menu_slug, string $category)
    {
        $menu = $this->getMenuFromSlug($menu_slug);

        $outil_gestions = OutilGestion::whereHas('category.translations', function ($query) use ($category) {
            $query->whereSlug($category);
        })
            ->where([
                'is_active' => 1,
                'menu_id' => $menu->id,
            ])
            ->withTranslation()
            ->with(['menu'])
            ->paginate(config('cms.front_pagination.outil_gestions')); // Todo make this variable outil_gestions per page

        $outil_gestion_categories = OutilGestionCategory::whereIsActive(true)
            ->whereMenuId($menu->id)
            ->withTranslation()
            ->whereHas('outil_gestions', function ($query) use ($menu) {
                $query->whereMenuId($menu->id)
                    ->whereIsActive(true);
            })
            ->orderBy('order')
            ->get();

        return view(front_dir() . '.outil_gestions.index', compact('outil_gestions', 'menu', 'outil_gestion_categories'));
    }
}
