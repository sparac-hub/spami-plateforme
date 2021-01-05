<?php

/**
 *
 *
 * Not USED
 *
 *
 *
 *
 */

namespace App\Services\Cms;

use App\Models\Cms\Menu;

class CmsMenu
{
    public static function generateUrl(array $menu_item): string
    {
        if ($menu_item['external_link']) {
            return $menu_item['http_protocol'] . $menu_item['external_link'];
        } elseif ($menu_item['slug']) {
            // TODO: Helper locale_prefix() : Take in considertion AutoRedirectToDefaultLocale
            return url(locale_prefix() . '/' . $menu_item['slug']);
        }

        return '#';
    }
}
