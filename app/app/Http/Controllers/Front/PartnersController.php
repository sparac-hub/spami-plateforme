<?php

namespace App\Http\Controllers\Front;

use App\Models\Cms\Menu;
use App\Models\Cms\Partner;
use Illuminate\Http\Request;
use App\Models\Cms\PartnerCategory;

class PartnersController extends CmsFrontController
{
    /**
     * @param Request $request
     * @return Response
     */
    public function index(Request $request, Menu $menu)
    {
        $partners = Partner::frontFilter($request, $menu->id);

        $partner_categories = PartnerCategory::whereIsActive(true)
            ->whereMenuId($menu->id)
            ->withTranslation()
            ->whereHas('partners', function ($query) use ($menu) {
                $query->whereMenuId($menu->id)
                    ->whereIsActive(true);
            })
            ->orderBy('order')
            ->get();

        return view(front_dir() . '.partners.index', compact('partners', 'partner_categories', 'menu'));
    }
}
