<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;

use App\Models\Cms\User;
use App\Models\Cms\Event;

// IMPORTANT! Add this to AuthServiceProvider:
// 'App\Models\Cms\Event' => 'App\Policies\EventPolicy',
class EventPolicy
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
     * @param Event $event
     * @return bool
     */
    public function index(User $user, Event $event)
    {
        return true;
    }

    /**
     * Determine if the given user can create.
     *
     * @param User $user
     * @param Event $event
     * @return bool
     */
    public function create(User $user, Event $event)
    {
        return true;
    }


    /**
     * Determine if the given user can create.
     *
     * @param User $user
     * @param Event $event
     * @return bool
     */
    public function store(User $user, Event $event)
    {
        return true;
    }


    /**
     * Determine if the given user can show the given event.
     *
     * @param User $user
     * @param Event $event
     * @return bool
     */
    public function show(User $user, Event $event)
    {
        // if($user->hasRole('admin')) return true;
        // show only for the owner
        // if($event->private == 1){
        //     return $user->id == $event->created_by;
        // }else{
        //   return true;
        // }
        return true;
    }

    /**
     * Determine if the given user can edit the given event.
     *
     * @param User $user
     * @param Event $event
     * @return bool
     */
    public function edit(User $user, Event $event)
    {
        // if($user->hasRole('admin')) return true;
        // return $user->id == $event->created_by;
        return true;
    }


    /**
     * Determine if the given user can update the given event.
     *
     * @param User $user
     * @param Event $event
     * @return bool
     */
    public function update(User $user, Event $event)
    {
        // if($user->hasRole('admin')) return true;
        // return $user->id == $event->created_by;
        return true;
    }


    /**
     * Determine if the given user can delete the given event.
     *
     * @param User $user
     * @param Event $event
     * @return bool
     */
    public function destroy(User $user, Event $event)
    {
        // if($user->hasRole('admin')) return true;
        // return $user->id == $event->created_by;
        return true;
    }

    /**
     * Determine if the given user can see data.
     *
     * @param User $user
     * @param Event $event
     * @return bool
     */
    public function datatables(User $user, Event $event)
    {
        // if($user->hasRole('admin')) return true;
        return true;
    }

}
