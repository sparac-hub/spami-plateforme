<?php

namespace App\Services\Cms;

use App\Models\Cms\Menu;
use App\Models\Cms\MenuTranslation;

class CmsBreadcrumb
{
    public static function getTree()
    {
        $menuTree = static::getMenuTree();

        array_unshift($menuTree, [
            'label' => __('og.home.home'),
            'url' => url('/'),
        ]);

        $moduleElementSlug = CmsUrl::getModuleElementSlug();


        if ($moduleElementSlug) {
            $menu = CmsUrl::getMenu();

            if ($mainModel = $menu->module->main_model ?? null) {

                $currentElement = $mainModel::whereHas('translations', function ($query) use ($moduleElementSlug) {
                    $query->whereLocale(locale())->whereSlug($moduleElementSlug);
                })->withTranslation()
                    ->whereMenuId($menu->id)
                    ->first();

                $menuTree[] = [
                    'label' => $currentElement->name ?? $currentElement->title ?? null, // depends on model
                    'url' => null,
                ];
            };
        }
        // dd($menuTree);
        // Set last url to null
        $menuTree[count($menuTree) - 1]['url'] = null;

        return $menuTree;
    }


    public static function getMenuTree()
    {
        $menuTree = [];

        $menu = static::getMenu();

        if ($menu):
            $menuTree[] = [
                'label' => $menu->label,
                'url' => generate_menu_url_from_obj($menu),
            ];

            while ($menu->parent_id) {
                $parentMenu = $menu->load('menu');
                $menu = $parentMenu->menu;
                $menuTree[] = [
                    'label' => $menu->label,
                    'url' => generate_menu_url_from_obj($menu),
                ];
            }

            return array_reverse($menuTree);
        endif;

        return [];
    }

    public static function getMenu()/*: ?Menu   <= return type null or menu */
    {
        $slug = CmsUrl::getSlug();

        $menuTranslation = MenuTranslation::with('menu.module')->whereSlug($slug)->first();

        if (isset($menuTranslation->menu)) {
            return $menuTranslation->menu;
        }

        return null;
    }

    public static function getSlugPositionFromUrl()
    {
        return CmsUrl::hasValidLocale() ? 2 : 1;
    }
}
