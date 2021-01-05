<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;

use App\Models\Cms\User;
use App\Models\Cms\UsefulLinkCategory;

// IMPORTANT! Add this to AuthServiceProvider:
// 'App\Models\Cms\UsefulLinkCategory' => 'App\Policies\UsefulLinkCategoryPolicy',
class UsefulLinkCategoryPolicy
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
     * @param UsefulLinkCategory $useful_link_category
     * @return bool
     */
    public function index(User $user, UsefulLinkCategory $useful_link_category)
    {
        return true;
    }

    /**
     * Determine if the given user can create.
     *
     * @param User $user
     * @param UsefulLinkCategory $useful_link_category
     * @return bool
     */
    public function create(User $user, UsefulLinkCategory $useful_link_category)
    {
        return true;
    }


    /**
     * Determine if the given user can create.
     *
     * @param User $user
     * @param UsefulLinkCategory $useful_link_category
     * @return bool
     */
    public function store(User $user, UsefulLinkCategory $useful_link_category)
    {
        return true;
    }


    /**
     * Determine if the given user can show the given useful_link_category.
     *
     * @param User $user
     * @param UsefulLinkCategory $useful_link_category
     * @return bool
     */
    public function show(User $user, UsefulLinkCategory $useful_link_category)
    {
        // if($user->hasRole('admin')) return true;
        // show only for the owner
        // if($useful_link_category->private == 1){
        //     return $user->id == $useful_link_category->created_by;
        // }else{
        //   return true;
        // }
        return true;
    }

    /**
     * Determine if the given user can edit the given useful_link_category.
     *
     * @param User $user
     * @param UsefulLinkCategory $useful_link_category
     * @return bool
     */
    public function edit(User $user, UsefulLinkCategory $useful_link_category)
    {
        // if($user->hasRole('admin')) return true;
        // return $user->id == $useful_link_category->created_by;
        return true;
    }


    /**
     * Determine if the given user can update the given useful_link_category.
     *
     * @param User $user
     * @param UsefulLinkCategory $useful_link_category
     * @return bool
     */
    public function update(User $user, UsefulLinkCategory $useful_link_category)
    {
        // if($user->hasRole('admin')) return true;
        // return $user->id == $useful_link_category->created_by;
        return true;
    }


    /**
     * Determine if the given user can delete the given useful_link_category.
     *
     * @param User $user
     * @param UsefulLinkCategory $useful_link_category
     * @return bool
     */
    public function destroy(User $user, UsefulLinkCategory $useful_link_category)
    {
        // if($user->hasRole('admin')) return true;
        // return $user->id == $useful_link_category->created_by;
        return true;
    }

    /**
     * Determine if the given user can see data.
     *
     * @param User $user
     * @param UsefulLinkCategory $useful_link_category
     * @return bool
     */
    public function datatables(User $user, UsefulLinkCategory $useful_link_category)
    {
        // if($user->hasRole('admin')) return true;
        return true;
    }

}
