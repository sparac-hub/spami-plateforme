<?php

namespace App\Observers;

use App\Models\Cms\Country;

class CountryObserver
{
    // All functions : creating, created, updating, updated, deleting, deleted, saving, saved, restoring, restored

    // ! important: Add these to your: AppServiceProvider.php
    // use App\Models\Cms\Country;
    // use App\Observers\CountryObserver;
    // Country::observe(CountryObserver::class);

    /**
     * Listen to the Country created event.
     *
     * @param App\Models\Cms\Country $country
     * @return  void
     */
    public function created(Country $country)
    {
        //
    }

    /**
     * Listen to the Country deleting event.
     *
     * @param App\Models\Cms\Country $country
     * @return  void
     */
    public function deleting(Country $country)
    {
        //
    }
}
