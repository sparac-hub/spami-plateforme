<?php

namespace App\Services\Cms;

use App\Models\Cms\MenuTranslation;

class CmsUrl
{
    static $reservedUrlSegments = [
        'category',
        'filter',
    ];

    public static function getMenuId()/*: ?int*/
    {
        $slug = static::getSlug();

        $menu_translation = MenuTranslation::select('menu_id')->whereSlug($slug)->first();

        return $menu_translation->menu_id ?? null;
    }

    public static function getSlug()
    {
        return static::hasValidLocale() ? request()->segment(2) : request()->segment(1);
    }

    public static function hasValidLocale(): bool
    {
        $urlLocale = app()->request->segment(1);

        if (static::isValidLocale($urlLocale)) {
            return true;
        }

        return false;
    }

    public static function isValidLocale($locale): bool
    {
        if (!is_string($locale)) {
            return false;
        }

        $locales = get_translatable_locales();

        return in_array($locale, $locales);
    }

    public static function getLocalization()
    {
        $menu = static::getMenu();
    }

    public static function getMenu()/*: ?Menu*/
    {
        $slug = static::getSlug();

        $menu_translation = MenuTranslation::with('menu.module')->whereSlug($slug)->first();

        return $menu_translation->menu ?? null;
    }

    /**
     *
     * Url patterns:
     * /{locale?}/{menuSlug?}/{moduleElementSlug?}
     * /{locale?}/{menuSlug?}/category/{moduleCategory}
     * /{locale?}/{menuSlug?}/filter?{queryString}
     *
     */
    public static function getModuleElementSlug()
    {
        $menuSlugPosition = static::getSlugPosition();

        if ($moduleElementSlug = request()->segment($menuSlugPosition + 1)) {
            if (!in_array($moduleElementSlug, static::$reservedUrlSegments)) {
                return $moduleElementSlug;
            }
        }

        return null;
    }

    public static function getSlugPosition() // Menu Slug Position (first element after locale)
    {
        return static::hasValidLocale() ? 2 : 1;
    }
}
