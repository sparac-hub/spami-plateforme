<?php

namespace App\Observers;

use App\Models\Cms\PostCategory;

class PostCategoryObserver
{
    // All functions : creating, created, updating, updated, deleting, deleted, saving, saved, restoring, restored

    // ! important: Add these to your: AppServiceProvider.php
    // use App\Models\Cms\PostCategory;
    // use App\Observers\PostCategoryObserver;
    // PostCategory::observe(PostCategoryObserver::class);

    /**
     * Listen to the PostCategory created event.
     *
     * @param PostCategory $post_category
     * @return  void
     */
    public function created(PostCategory $post_category)
    {
        //
    }

    /**
     * Listen to the PostCategory deleting event.
     *
     * @param PostCategory $post_category
     * @return  void
     */
    public function deleting(PostCategory $post_category)
    {
        //
    }
}
