<?php

namespace App\Http\Controllers\Front;

use App\Models\Cms\Aspim;
use App\Models\Cms\AspimTranslation;
use App\Models\Cms\Plan;
use App\Models\Cms\Menu;
use Illuminate\Http\Request;
use App\Models\Cms\PlanCategory;
use Spatie\MediaLibrary\Models\Media;

class PlansController extends CmsFrontController
{
    /**
     * @param Request $request
     * @return Response
     */
    public function index(Request $request, Menu $menu)
    {
        $plans = Plan::frontFilter($request, $menu->id);

        $plan_categories = PlanCategory::whereIsActive(true)
            ->whereMenuId($menu->id)
            ->withTranslation()
            ->whereHas('plans', function ($query) use ($menu) {
                $query->whereMenuId($menu->id)->whereIsActive(true);
            })
            ->orderBy('order')
            ->get();

        $aspims = AspimTranslation::where('locale', locale())->orderBy('name')->get();

        if ($request->ajax()) {
            $view_list = view(front_dir() . '.plans.liste_index', compact('plans', 'plan_categories', 'menu', 'aspims'))->render();
            return response()->json(['resultat' => true, 'view_list' => $view_list]);
        }
        return view(front_dir() . '.plans.index', compact('plans', 'plan_categories', 'menu', 'aspims'));
    }

    /**
     * @param string $slug
     * @return  Response
     */
    public function show($slug)
    {
        $plan = Plan::whereIsActive(true)
            ->with(['translations', 'menu'])
            ->whereHas('translations', function ($query) use ($slug) {
                $query->whereSlug($slug)->whereLocale(locale());
            })
            ->firstOrFail();

        return view(front_dir() . '.plans.show', compact('plan'));
    }

    /**
     * Show File Category and list all active items under this category
     */
    public function category($menu_slug, $category)
    {
        $menu = $this->getMenuFromSlug($menu_slug);

        $plans = Plan::whereHas('category.translations', function ($query) use ($category) {
            $query->whereSlug($category);
        })
            ->where([
                'is_active' => 1,
                'menu_id' => $menu->id,
            ])
            ->withTranslation()
            ->with(['menu'])
            ->paginate(config('cms.front_pagination.plans')); // Todo make this variable files per page

        return view(front_dir() . '.plans.index', compact('plans', 'menu'));
    }

    public function download($mediaItem)
    {
        $media = Media::where('id', $mediaItem)->first();

        return response()->download($media->getPath(), $media->plan_name);
    }
}
