<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;

use App\Models\Cms\User;
use App\Models\Cms\Post;

// IMPORTANT! Add this to AuthServiceProvider:
// 'App\Models\Cms\Post' => 'App\Policies\PostPolicy',
class PostPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the given user can index.
     *
     * @param User $user
     * @param Post $post
     * @return bool
     */
    public function index(User $user, Post $post)
    {
        return true;
    }

    /**
     * Determine if the given user can create.
     *
     * @param User $user
     * @param Post $post
     * @return bool
     */
    public function create(User $user, Post $post)
    {
        return true;
    }


    /**
     * Determine if the given user can create.
     *
     * @param User $user
     * @param Post $post
     * @return bool
     */
    public function store(User $user, Post $post)
    {
        return true;
    }


    /**
     * Determine if the given user can show the given post.
     *
     * @param User $user
     * @param Post $post
     * @return bool
     */
    public function show(User $user, Post $post)
    {
        // if($user->hasRole('admin')) return true;
        // show only for the owner
        // if($post->private == 1){
        //     return $user->id == $post->created_by;
        // }else{
        //   return true;
        // }
        return true;
    }

    /**
     * Determine if the given user can edit the given post.
     *
     * @param User $user
     * @param Post $post
     * @return bool
     */
    public function edit(User $user, Post $post)
    {
        // if($user->hasRole('admin')) return true;
        // return $user->id == $post->created_by;
        return true;
    }


    /**
     * Determine if the given user can update the given post.
     *
     * @param User $user
     * @param Post $post
     * @return bool
     */
    public function update(User $user, Post $post)
    {
        // if($user->hasRole('admin')) return true;
        // return $user->id == $post->created_by;
        return true;
    }


    /**
     * Determine if the given user can delete the given post.
     *
     * @param User $user
     * @param Post $post
     * @return bool
     */
    public function destroy(User $user, Post $post)
    {
        // if($user->hasRole('admin')) return true;
        // return $user->id == $post->created_by;
        return true;
    }

    /**
     * Determine if the given user can see data.
     *
     * @param User $user
     * @param Post $post
     * @return bool
     */
    public function datatables(User $user, Post $post)
    {
        // if($user->hasRole('admin')) return true;
        return true;
    }

}
