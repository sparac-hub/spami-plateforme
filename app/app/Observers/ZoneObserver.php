<?php

namespace App\Observers;

use App\Models\Cms\Zone;

class ZoneObserver
{
    // All functions : creating, created, updating, updated, deleting, deleted, saving, saved, restoring, restored

    // ! important: Add these to your: AppServiceProvider.php
    // use App\Models\Cms\Zone;
    // use App\Observers\ZoneObserver;
    // Zone::observe(ZoneObserver::class);

    /**
     * Listen to the Zone created event.
     *
     * @param App\Models\Cms\Zone $zone
     * @return  void
     */
    public function created(Zone $zone)
    {
        //
    }

    /**
     * Listen to the Zone deleting event.
     *
     * @param App\Models\Cms\Zone $zone
     * @return  void
     */
    public function deleting(Zone $zone)
    {
        //
    }
}
