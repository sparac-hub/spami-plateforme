<?php

namespace App\Observers;

use App\Models\Cms\Menu;

class MenuObserver
{
    // All functions : creating, created, updating, updated, deleting, deleted, saving, saved, restoring, restored

    // ! important: Add these to your: AppServiceProvider.php
    // use App\Models\Cms\Menu;
    // use App\Observers\MenuObserver;
    // Menu::observe(MenuObserver::class);

    /**
     * Listen to the Menu created event.
     *
     * @param Menu $menu
     * @return  void
     */
    public function created(Menu $menu)
    {
        //
    }

    /**
     * Listen to the Menu deleting event.
     *
     * @param Menu $menu
     * @return  void
     */
    public function deleting(Menu $menu)
    {
        //
    }
}
