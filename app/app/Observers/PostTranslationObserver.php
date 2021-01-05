<?php

namespace App\Observers;

use App\Models\Cms\PostTranslation;

class PostTranslationObserver
{
    // All functions : creating, created, updating, updated, deleting, deleted, saving, saved, restoring, restored

    // ! important: Add these to your: AppServiceProvider.php
    // use App\Models\Cms\PostTranslation;
    // use App\Observers\PostTranslationObserver;
    // PostTranslation::observe(PostTranslationObserver::class);

    /**
     * Listen to the PostTranslation created event.
     *
     * @param PostTranslation $post_translation
     * @return  void
     */
    public function created(PostTranslation $post_translation)
    {
        //
    }

    /**
     * Listen to the PostTranslation deleting event.
     *
     * @param PostTranslation $post_translation
     * @return  void
     */
    public function deleting(PostTranslation $post_translation)
    {
        //
    }
}
