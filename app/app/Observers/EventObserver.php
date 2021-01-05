<?php

namespace App\Observers;

use App\Models\Cms\Event;

class EventObserver
{
    // All functions : creating, created, updating, updated, deleting, deleted, saving, saved, restoring, restored

    // ! important: Add these to your: AppServiceProvider.php
    // use App\Models\Cms\Event;
    // use App\Observers\EventObserver;
    // Event::observe(EventObserver::class);

    /**
     * Listen to the Event created event.
     *
     * @param App\Models\Cms\Event $event
     * @return  void
     */
    public function created(Event $event)
    {
        //
    }

    /**
     * Listen to the Event deleting event.
     *
     * @param App\Models\Cms\Event $event
     * @return  void
     */
    public function deleting(Event $event)
    {
        //
    }
}
