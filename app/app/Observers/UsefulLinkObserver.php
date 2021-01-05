<?php

namespace App\Observers;

use App\Models\Cms\UsefulLink;

class UsefulLinkObserver
{
    // All functions : creating, created, updating, updated, deleting, deleted, saving, saved, restoring, restored

    // ! important: Add these to your: AppServiceProvider.php
    // use App\Models\Cms\UsefulLink;
    // use App\Observers\UsefulLinkObserver;
    // UsefulLink::observe(UsefulLinkObserver::class);

    /**
     * Listen to the UsefulLink created event.
     *
     * @param App\Models\Cms\UsefulLink $useful_link
     * @return  void
     */
    public function created(UsefulLink $useful_link)
    {
        //
    }

    /**
     * Listen to the UsefulLink deleting event.
     *
     * @param App\Models\Cms\UsefulLink $useful_link
     * @return  void
     */
    public function deleting(UsefulLink $useful_link)
    {
        //
    }
}
