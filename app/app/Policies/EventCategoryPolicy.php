<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;

use App\Models\Cms\User;
use App\Models\Cms\EventCategory;

// IMPORTANT! Add this to AuthServiceProvider:
// 'App\Models\Cms\EventCategory' => 'App\Policies\EventCategoryPolicy',
class EventCategoryPolicy
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
     * @param EventCategory $event_category
     * @return bool
     */
    public function index(User $user, EventCategory $event_category)
    {
        return true;
    }

    /**
     * Determine if the given user can create.
     *
     * @param User $user
     * @param EventCategory $event_category
     * @return bool
     */
    public function create(User $user, EventCategory $event_category)
    {
        return true;
    }


    /**
     * Determine if the given user can create.
     *
     * @param User $user
     * @param EventCategory $event_category
     * @return bool
     */
    public function store(User $user, EventCategory $event_category)
    {
        return true;
    }


    /**
     * Determine if the given user can show the given event_category.
     *
     * @param User $user
     * @param EventCategory $event_category
     * @return bool
     */
    public function show(User $user, EventCategory $event_category)
    {
        // if($user->hasRole('admin')) return true;
        // show only for the owner
        // if($event_category->private == 1){
        //     return $user->id == $event_category->created_by;
        // }else{
        //   return true;
        // }
        return true;
    }

    /**
     * Determine if the given user can edit the given event_category.
     *
     * @param User $user
     * @param EventCategory $event_category
     * @return bool
     */
    public function edit(User $user, EventCategory $event_category)
    {
        // if($user->hasRole('admin')) return true;
        // return $user->id == $event_category->created_by;
        return true;
    }


    /**
     * Determine if the given user can update the given event_category.
     *
     * @param User $user
     * @param EventCategory $event_category
     * @return bool
     */
    public function update(User $user, EventCategory $event_category)
    {
        // if($user->hasRole('admin')) return true;
        // return $user->id == $event_category->created_by;
        return true;
    }


    /**
     * Determine if the given user can delete the given event_category.
     *
     * @param User $user
     * @param EventCategory $event_category
     * @return bool
     */
    public function destroy(User $user, EventCategory $event_category)
    {
        // if($user->hasRole('admin')) return true;
        // return $user->id == $event_category->created_by;
        return true;
    }

    /**
     * Determine if the given user can see data.
     *
     * @param User $user
     * @param EventCategory $event_category
     * @return bool
     */
    public function datatables(User $user, EventCategory $event_category)
    {
        // if($user->hasRole('admin')) return true;
        return true;
    }

}
