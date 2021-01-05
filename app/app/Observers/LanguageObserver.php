<?php

namespace App\Observers;

use App\Models\Cms\Language;

class LanguageObserver
{
    // All functions : creating, created, updating, updated, deleting, deleted, saving, saved, restoring, restored

    // ! important: Add these to your: AppServiceProvider.php
    // use App\Models\Cms\Language;
    // use App\Observers\LanguageObserver;
    // Language::observe(LanguageObserver::class);

    /**
     * Listen to the Language created event.
     *
     * @param Language $language
     * @return  void
     */
    public function created(Language $language)
    {
        //
    }

    /**
     * Listen to the Language deleting event.
     *
     * @param Language $language
     * @return  void
     */
    public function deleting(Language $language)
    {
        //
    }
}
