<?php

namespace App\Http\Controllers\Front;

use App\Models\Cms\Aspim;
use App\Models\Cms\AspimTranslation;
use App\Models\Cms\Country;
use App\Models\Cms\GestionnaireAspim;
use App\Models\Cms\Menu;
use Illuminate\Http\Request;

class GestionnaireAspimController extends CmsFrontController
{
    /**
     * @param Request $request
     * @param $menu_slug
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request, Menu $menu)
    {
        $gest_aspims = GestionnaireAspim::frontFilter($request, $menu->id);

        $aspims = AspimTranslation::where('locale', locale())->orderBy('name')->get();

        $countries = Country::whereIsActive(true)->withTranslation()->get();

        if ($request->ajax() || $request->wantsJson()) {
            $view_list = view(front_dir() . '.gestionnaire_aspim.partials.list_index', compact('gest_aspims'))->render();
            return response()->json(['data' => true, 'view_list' => $view_list]);
        }

        return view(front_dir() . '.gestionnaire_aspim.index', compact('aspims', 'gest_aspims', 'countries', 'menu'));
    }

    /**
     * @param int $slug
     * @return  Response
     */
    public function show($slug)
    {
        $aspim = GestionnaireAspim::whereIsActive(true)
            ->with(['translations', 'menu'])
            ->whereHas('translations', function ($query) use ($slug) {
                $query->whereSlug($slug)->whereLocale(locale());
            })
            ->firstOrFail();

        $menu = $aspim->menu;

        return view(front_dir() . '.aspims.show', compact('aspim', 'menu'));
    }
}
