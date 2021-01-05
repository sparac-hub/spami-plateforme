<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;

use App\Models\Cms\User;
use App\Models\Cms\PostCategory;

// IMPORTANT! Add this to AuthServiceProvider:
// 'App\Models\Cms\PostCategory' => 'App\Policies\PostCategoryPolicy',
class PostCategoryPolicy
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
     * @param PostCategory $post_category
     * @return bool
     */
    public function index(User $user, PostCategory $post_category)
    {
        return true;
    }

    /**
     * Determine if the given user can create.
     *
     * @param User $user
     * @param PostCategory $post_category
     * @return bool
     */
    public function create(User $user, PostCategory $post_category)
    {
        return true;
    }


    /**
     * Determine if the given user can create.
     *
     * @param User $user
     * @param PostCategory $post_category
     * @return bool
     */
    public function store(User $user, PostCategory $post_category)
    {
        return true;
    }


    /**
     * Determine if the given user can show the given post_category.
     *
     * @param User $user
     * @param PostCategory $post_category
     * @return bool
     */
    public function show(User $user, PostCategory $post_category)
    {
        // if($user->hasRole('admin')) return true;
        // show only for the owner
        // if($post_category->private == 1){
        //     return $user->id == $post_category->created_by;
        // }else{
        //   return true;
        // }
        return true;
    }

    /**
     * Determine if the given user can edit the given post_category.
     *
     * @param User $user
     * @param PostCategory $post_category
     * @return bool
     */
    public function edit(User $user, PostCategory $post_category)
    {
        // if($user->hasRole('admin')) return true;
        // return $user->id == $post_category->created_by;
        return true;
    }


    /**
     * Determine if the given user can update the given post_category.
     *
     * @param User $user
     * @param PostCategory $post_category
     * @return bool
     */
    public function update(User $user, PostCategory $post_category)
    {
        // if($user->hasRole('admin')) return true;
        // return $user->id == $post_category->created_by;
        return true;
    }


    /**
     * Determine if the given user can delete the given post_category.
     *
     * @param User $user
     * @param PostCategory $post_category
     * @return bool
     */
    public function destroy(User $user, PostCategory $post_category)
    {
        // if($user->hasRole('admin')) return true;
        // return $user->id == $post_category->created_by;
        return true;
    }

    /**
     * Determine if the given user can see data.
     *
     * @param User $user
     * @param PostCategory $post_category
     * @return bool
     */
    public function datatables(User $user, PostCategory $post_category)
    {
        // if($user->hasRole('admin')) return true;
        return true;
    }

}
