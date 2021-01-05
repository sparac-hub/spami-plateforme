<?php

namespace App\Observers;

use App\Models\Cms\UsefulLinkCategory;

class UsefulLinkCategoryObserver
{
    // All functions : creating, created, updating, updated, deleting, deleted, saving, saved, restoring, restored

    // ! important: Add these to your: AppServiceProvider.php
    // use App\Models\Cms\UsefulLinkCategory;
    // use App\Observers\UsefulLinkCategoryObserver;
    // UsefulLinkCategory::observe(UsefulLinkCategoryObserver::class);

    /**
     * Listen to the UsefulLinkCategory created event.
     *
     * @param App\Models\Cms\UsefulLinkCategory $useful_link_category
     * @return  void
     */
    public function created(UsefulLinkCategory $useful_link_category)
    {
        //
    }

    /**
     * Listen to the UsefulLinkCategory deleting event.
     *
     * @param App\Models\Cms\UsefulLinkCategory $useful_link_category
     * @return  void
     */
    public function deleting(UsefulLinkCategory $useful_link_category)
    {
        //
    }
}
