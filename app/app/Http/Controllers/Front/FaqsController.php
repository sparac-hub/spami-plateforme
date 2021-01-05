<?php

namespace App\Http\Controllers\Front;

use App\Models\Cms\Menu;
use App\Models\Cms\FaqItem;
use Illuminate\Http\Request;
use App\Models\Cms\FaqCategory;

class FaqsController extends CmsFrontController
{
    public function index(Request $request, Menu $menu)
    {
        $faqs = FaqItem::frontFilter($request, $menu->id);

        $faq_categories = FaqCategory::whereIsActive(true)
            ->whereMenuId($menu->id)
            ->withTranslation()
            ->whereHas('faq_items', function ($query) use ($menu) {
                $query->whereMenuId($menu->id)->whereIsActive(true);
            })
            ->orderBy('order')
            ->get();

        return view(front_dir() . '.faqs.index', compact('faqs', 'faq_categories', 'menu'));
    }

    /**
     * Show FAQ Category and list all active items under this category
     */
    public function category(Request $request, $category)
    {
        $menu_id = $this->getMenuIdFromUrl();

        $faq_categories = FaqCategory::whereHas('translations', function ($query) use ($category) {
            $query->whereSlug($category);
        })
            ->whereIsActive(true)
            ->whereMenuId($menu_id)
            ->withTranslation()
            ->with([
                'faq_items' => function ($query) {
                    $query->whereIsActive(true)->withTranslation();
                },
            ])
            ->orderBy('order')
            ->get();

        return view(front_dir() . '.faqs.index', compact('faq_categories'));
    }

}
