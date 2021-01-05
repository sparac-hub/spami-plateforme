<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Models\Cms\UsefulLink;
use App\Models\Cms\UsefulLinkCategory;

class UsefulLinksController extends CmsFrontController
{
    public function index(Request $request, $menu)
    {
        $useful_links = UsefulLink::frontFilter($request, $menu->id);

        $useful_link_categories = UsefulLinkCategory::whereIsActive(true)
            ->whereMenuId($menu->id)
            ->withTranslation()
            ->whereHas('useful_links', function ($query) use ($menu) {
                $query->whereMenuId($menu->id)->whereIsActive(true);
            })
            ->orderBy('order')
            ->get();

        return view(front_dir() . '.useful_links.index', compact('useful_links', 'useful_link_categories', 'menu'));
    }

    /**
     * Show UsefulLink Category and list all active items under this category
     */
    public function category(string $menu_slug, string $category)
    {
        return view(front_dir() . '.useful_links.category');
    }
}
