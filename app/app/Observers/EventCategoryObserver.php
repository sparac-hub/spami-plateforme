<?php

namespace App\Observers;

use App\Models\Cms\EventCategory;

class EventCategoryObserver
{
    // All functions : creating, created, updating, updated, deleting, deleted, saving, saved, restoring, restored

    // ! important: Add these to your: AppServiceProvider.php
    // use App\Models\Cms\EventCategory;
    // use App\Observers\EventCategoryObserver;
    // EventCategory::observe(EventCategoryObserver::class);

    /**
     * Listen to the EventCategory created event.
     *
     * @param App\Models\Cms\EventCategory $event_category
     * @return  void
     */
    public function created(EventCategory $event_category)
    {
        //
    }

    /**
     * Listen to the EventCategory deleting event.
     *
     * @param App\Models\Cms\EventCategory $event_category
     * @return  void
     */
    public function deleting(EventCategory $event_category)
    {
        //
    }
}
