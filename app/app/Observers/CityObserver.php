<?php

namespace App\Observers;

use App\Models\Cms\City;

class CityObserver
{
    // All functions : creating, created, updating, updated, deleting, deleted, saving, saved, restoring, restored

    // ! important: Add these to your: AppServiceProvider.php
    // use App\Models\Cms\City;
    // use App\Observers\CityObserver;
    // City::observe(CityObserver::class);

    /**
     * Listen to the City created event.
     *
     * @param App\Models\Cms\City $city
     * @return  void
     */
    public function created(City $city)
    {
        //
    }

    /**
     * Listen to the City deleting event.
     *
     * @param App\Models\Cms\City $city
     * @return  void
     */
    public function deleting(City $city)
    {
        //
    }
}
