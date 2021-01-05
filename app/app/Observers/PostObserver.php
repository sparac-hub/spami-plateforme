<?php

namespace App\Observers;

use App\Models\Cms\Post;

class PostObserver
{
    // All functions : creating, created, updating, updated, deleting, deleted, saving, saved, restoring, restored

    // ! important: Add these to your: AppServiceProvider.php
    // use App\Models\Cms\Post;
    // use App\Observers\PostObserver;
    // Post::observe(PostObserver::class);

    /**
     * Listen to the Post created event.
     *
     * @param Post $post
     * @return  void
     */
    public function created(Post $post)
    {
        //
    }

    /**
     * Listen to the Post deleting event.
     *
     * @param Post $post
     * @return  void
     */
    public function deleting(Post $post)
    {
        //
    }
}
