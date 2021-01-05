<?php

namespace App\Observers;

use App\Models\Cms\Governorate;

class GovernorateObserver
{
    // All functions : creating, created, updating, updated, deleting, deleted, saving, saved, restoring, restored

    // ! important: Add these to your: AppServiceProvider.php
    // use App\Models\Cms\Governorate;
    // use App\Observers\GovernorateObserver;
    // Governorate::observe(GovernorateObserver::class);

    /**
     * Listen to the Governorate created event.
     *
     * @param App\Models\Cms\Governorate $governorate
     * @return  void
     */
    public function created(Governorate $governorate)
    {
        //
    }

    /**
     * Listen to the Governorate deleting event.
     *
     * @param App\Models\Cms\Governorate $governorate
     * @return  void
     */
    public function deleting(Governorate $governorate)
    {
        //
    }
}
