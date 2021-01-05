<?php

namespace App\Http\Controllers\Front;

use App\Models\Cms\Aspim;
use App\Models\Cms\CountryTranslation;
use App\Models\Cms\MapLayer;
use Illuminate\Http\Request;
use App\Models\Cms\AspimCategory;
use App\Models\Cms\Country;

class AspimsController extends CmsFrontController
{

    /**
     * @param Request $request
     * @param         $menu
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\JsonResponse|\Illuminate\View\View
     * @throws \Throwable
     */
    public function index(Request $request, $menu)
    {
        $aspims = Aspim::frontFilter($request, $menu->id);

        $countries = CountryTranslation::where('locale', app()->getLocale())->orderBy('name')->get();

        $aspim_categories = AspimCategory::whereIsActive(true)->whereMenuId($menu->id)->withTranslation()
            ->whereHas('aspims', function ($query) use ($menu) {
                $query->whereMenuId($menu->id)->whereIsActive(true);
            })->orderBy('order')->get();

        if ($request->ajax()) {
            $view_list = view(front_dir() . '.aspims.partials.list_index', compact('aspims'))->render();

            return response()->json(['resultat' => true, 'view_list' => $view_list]);
        }

        return view(front_dir() . '.aspims.index', compact('aspims', 'aspim_categories', 'menu', 'countries'));
    }

    /**
     * @param int $slug
     * @return  Response
     */
    public function show($slug)
    {
        $aspim = Aspim::whereIsActive(true)->with(['translations', 'menu'])->whereHas('translations', function ($query
        ) use ($slug) {
            $query->whereSlug($slug)->whereLocale(locale());
        })->firstOrFail();

        $menu = $aspim->menu;

        $footer_white = true;

        return view(front_dir() . '.aspims.show', compact('aspim', 'menu', 'footer_white'));
    }

    /**
     * Show Aspim Category and list all active items under this category
     *
     * @param string $menu_slug
     * @param string $category
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function category(string $menu_slug, string $category)
    {
        $menu = $this->getMenuFromSlug($menu_slug);

        $aspims = Aspim::whereHas('category.translations', function ($query) use ($category) {
            $query->whereSlug($category);
        })->where([
            'is_active' => 1,
            'menu_id' => $menu->id,
        ])->withTranslation()->with(['menu'])
            ->paginate(config('cms.front_pagination.aspims')); // Todo make this variable aspims per page

        $aspim_categories = AspimCategory::whereIsActive(true)->whereMenuId($menu->id)->withTranslation()
            ->whereHas('aspims', function ($query) use ($menu) {
                $query->whereMenuId($menu->id)->whereIsActive(true);
            })->orderBy('order')->get();

        return view(front_dir() . '.aspims.index', compact('aspims', 'menu', 'aspim_categories'));
    }

    public function map(Request $request, $menu)
    {
        //get all aspims
        $aspims = Aspim::frontFilterMap($request, $menu->id);

        //get counties
        $countries = Country::whereIsActive(true)->get();

        $aspim_categories = AspimCategory::whereIsActive(true)->whereMenuId($menu->id)->withTranslation()
            ->whereHas('aspims', function ($query) use ($menu) {
                $query->whereMenuId($menu->id)->whereIsActive(true);
            })->orderBy('order')->get();

        //get all layers
        $layers = MapLayer::frontFilter($request);

        if ($request->ajax()) {
            $view_list = view(front_dir() . '.aspims.partials.list_index', compact('aspims'))->render();

            return response()->json(['resultat' => true, 'view_list' => $view_list]);
        }

        return view(front_dir() . '.aspims.map', compact('aspims', 'aspim_categories', 'menu', 'countries', 'layers'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getByAspim(Request $request)
    {

        if ($request->ajax()) {
            if ($request->aspim) {
                $aspim_id = $request->aspim;
                $aspim = Aspim::find($aspim_id);

                if ($aspim) {
                    return response()->json([
                        'status' => true,
                        'data' => $aspim->mapamed_feature_id,
                        'aspim' => [
                            'link' => front_show($aspim),
                            'title' => $aspim->name,
                        ],
                    ]);
                } else {
                    return response()->json([
                        'status' => false,
                    ]);
                }
            }

            return response()->json(['status' => false, 'msg' => '']);
        }
        redirect()->route('front.home');
    }

    /**
     * @param Request $request
     * @param         $slug
     * @return \Illuminate\Http\JsonResponse
     */
    public function getAspimsByCountry(Request $request, $slug)
    {
        $menu = $this->getMenuFromSlug($slug);
        if ($request->ajax()) {
            if ($menu) {
                $aspims = Aspim::frontFilterMap($request, $menu->id);
                $aspimAjax = [];
                if ($aspims->isNotEmpty()) {
                    foreach (collection_sort_by($aspims) as $aspim) {
                        array_push($aspimAjax, [
                            'value' => $aspim->id,
                            'text' => $aspim->name,
                            'id' => $aspim->mapamed_feature_id,
                        ]);
                    }
                }
                if (count($aspimAjax)) {
                    return response()->json([
                        'status' => true,
                        'data' => $aspimAjax,
                        'filter' => ($request->keywords || $request->country || $request->included_at) ? true : false,
                    ]);
                } else {
                    return response()->json([
                        'status' => false,
                        'msg' => '',
                    ]);
                }
            }

            return response()->json(['status' => false, 'msg' => '']);
        }
        redirect()->route('front.home');
    }
}
