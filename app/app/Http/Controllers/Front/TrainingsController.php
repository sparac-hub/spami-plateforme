<?php

namespace App\Http\Controllers\Front;

use App\Models\Cms\Menu;
use App\Models\Cms\TrainingCategory;
use Illuminate\Http\Request;
use App\Models\Cms\Training;

class TrainingsController extends CmsFrontController
{
    /**
     * @param Request $request
     * @return Response
     */
    public function index(Request $request, Menu $menu)
    {
        $trainings = Training::FrontFilter($request, $menu->id);

        if ($request->ajax()) {
            /*$view_list = view(front_dir().'.trainings.partials.list_index', compact('trainings'))->render();
            return response()->json(['resultat' => true, 'view_list' => $view_list]);*/

            if ($trainings->total()) {
                $view_list = view(front_dir() . '.trainings.partials.list_index', compact('trainings'))->render();
                return response()->json(['status' => 'ok', 'view_list' => $view_list, 'is_active' => ($trainings->currentPage() >= $trainings->lastPage()) ? FALSE : TRUE]);
            } else {
                return response()->json(['status' => 'no', 'view_list' => ""]);
            }
        }

        /* $training_categories = TrainingCategory::where([
             'is_active' => true,
             'menu_id' => $menu->id,
         ])->get();*/

        return view(front_dir() . '.trainings.index', compact('trainings', 'menu'));
    }

    /**
     * @param string $slug
     * @return  Response
     */
    public function show($slug)
    {
        $training = Training::whereIsActive(true)
            ->with(['translations', 'menu'])
            ->whereHas('translations', function ($query) use ($slug) {
                $query->whereSlug($slug)->whereLocale(locale());
            })
            ->firstOrFail();

        $menu = $training->menu;

        return view(front_dir() . '.trainings.show', compact('training', 'menu'));
    }

    /**
     * Show Training Category and list all active items under this category
     */
    public function category(string $menu_slug, string $category_slug)
    {
        $menu = $this->getMenuFromSlug($menu_slug);

        $trainings = Training::whereHas('category.translations', function ($query) use ($category_slug) {
            $query->whereSlug($category_slug);
        })
            ->where([
                'is_active' => true,
                'menu_id' => $menu->id,
            ])
            ->withTranslation()
            ->with(['menu'])
            ->paginate(config('cms.front_pagination.trainings')); // Todo make this variable trainings per page

        return view(front_dir() . '.trainings.index', compact('trainings'));
    }

}
