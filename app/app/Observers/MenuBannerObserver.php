<?php

namespace App\Observers;

use App\Models\Cms\MenuBanner;

class MenuBannerObserver
{
    // All functions : creating, created, updating, updated, deleting, deleted, saving, saved, restoring, restored

    // ! important: Add these to your: AppServiceProvider.php
    // use App\Models\Cms\MenuBanner;
    // use App\Observers\MenuBannerObserver;
    // MenuBanner::observe(MenuBannerObserver::class);

    /**
     * Listen to the MenuBanner created event.
     *
     * @param MenuBanner $menu_banner
     * @return  void
     */
    public function created(MenuBanner $menu_banner)
    {
        //
    }

    /**
     * Listen to the MenuBanner deleting event.
     *
     * @param MenuBanner $menu_banner
     * @return  void
     */
    public function deleting(MenuBanner $menu_banner)
    {
        //
    }
}
