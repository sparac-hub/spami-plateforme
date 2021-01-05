<?php

namespace App\Observers;

use App\Models\Cms\Page;

class PageObserver
{
    // All functions : creating, created, updating, updated, deleting, deleted, saving, saved, restoring, restored

    // ! important: Add these to your: AppServiceProvider.php
    // use App\Models\Cms\Page;
    // use App\Observers\PageObserver;
    // Page::observe(PageObserver::class);

    /**
     * Listen to the Page created event.
     *
     * @param Page $page
     * @return  void
     */
    public function created(Page $page)
    {
        //
    }

    /**
     * Listen to the Page deleting event.
     *
     * @param Page $page
     * @return  void
     */
    public function deleting(Page $page)
    {
        //
    }
}
