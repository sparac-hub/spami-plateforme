<?php

namespace App\Http\Controllers\Front;

use App\Models\Cms\Menu;
use App\Models\Cms\Sitemap;
use Illuminate\Http\Request;

class SitemapsController extends CmsFrontController
{
    /**
     * @param Request $request
     * @return Response
     */
    public function index(Request $request, Menu $menu)
    {
        $sitemaps = Sitemap::whereMenuId($menu->id)->firstOrFail();

        return view(front_dir() . '.sitemaps.index', compact('sitemaps', 'menu'));
    }
}
