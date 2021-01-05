<?php

namespace App\Http\Controllers\Front;

use App\Http\Requests;
use App\Models\Cms\Menu;

class PagesController extends CmsFrontController
{

    public function index()
    {
        $slug = $this->getSlugFromUrl();

        return $this->show($slug);
    }

    /**
     * @param string $slug
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(string $slug)
    {
        $menu = Menu::with([
            'page' => function ($query) {
                $query->withTranslation();
            },
        ])
            ->whereHas('translations', function ($q) use ($slug) {
                $q->where([
                    'slug' => $slug,
                    'locale' => locale(),
                ]);
            })->firstOrFail();

        return view(front_dir() . '.pages.show', compact('menu'));
    }
}
