<?php

namespace App\Http\Controllers\Front;

use App\Http\Requests;
use App\Models\Cms\Menu;

class RoutesController extends CmsFrontController
{
    /**
     * @param string $menu_slug
     * @return mixed
     */
    public function index(string $menu_slug)
    {
        $menu = $this->getMenuFromSlug($menu_slug);

        if (isset($menu->module)) {
            if ($menu->module->reference == 'home') {
                return redirect()->route('front.home');
            }

            return app($menu->module->frontal_controller)->index(request(), $menu);
        } else {
            $link = routeForMenu($menu);

            return redirect($link);
        }
    }

    /**
     * @param string $slug
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(string $menu_slug, string $slug)
    {
        $menu = Menu::with([
            'page' => function ($query) {
                $query->withTranslation();
            },
        ])->whereHas('translations', function ($q) use ($menu_slug) {
            $q->where([
                'slug' => $menu_slug,
                'locale' => locale(),
            ]);
        })->firstOrFail();

        return app($menu->module->frontal_controller)->show($slug);
    }

    /**
     * @param string $menu_slug
     * @param $category_slug
     * @return mixed
     */
    public function category(string $menu_slug, string $category_slug)
    {
        $menu = $this->getMenuFromSlug($menu_slug);

        return app($menu->module->frontal_controller)->category($menu_slug, $category_slug);
    }

    /**
     * @param string $menu_slug
     */
    public function map(string $menu_slug)
    {
        $menu = $this->getMenuFromSlug($menu_slug);
        if (method_exists(app($menu->module->frontal_controller), 'map')) {
            return app($menu->module->frontal_controller)->map(request(), $menu);
        }

        return abort(404);
    }
}
