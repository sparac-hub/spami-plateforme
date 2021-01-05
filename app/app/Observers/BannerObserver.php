<?php

namespace App\Observers;

use App\Models\Cms\Banner;

class BannerObserver
{
    // All functions : creating, created, updating, updated, deleting, deleted, saving, saved, restoring, restored

    // ! important: Add these to your: AppServiceProvider.php
    // use App\Models\Cms\Banner;
    // use App\Observers\BannerObserver;
    // Banner::observe(BannerObserver::class);

    /**
     * Listen to the Banner created event.
     *
     * @param Banner $banner
     * @return  void
     */
    public function created(Banner $banner)
    {
        //
    }

    /**
     * Listen to the Banner deleting event.
     *
     * @param Banner $banner
     * @return  void
     */
    public function deleting(Banner $banner)
    {
        //
    }
}
