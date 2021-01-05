<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;

use App\Models\Cms\User;
use App\Models\Cms\UsefulLink;

// IMPORTANT! Add this to AuthServiceProvider:
// 'App\Models\Cms\UsefulLink' => 'App\Policies\UsefulLinkPolicy',
class UsefulLinkPolicy
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
     * @param UsefulLink $useful_link
     * @return bool
     */
    public function index(User $user, UsefulLink $useful_link)
    {
        return true;
    }

    /**
     * Determine if the given user can create.
     *
     * @param User $user
     * @param UsefulLink $useful_link
     * @return bool
     */
    public function create(User $user, UsefulLink $useful_link)
    {
        return true;
    }


    /**
     * Determine if the given user can create.
     *
     * @param User $user
     * @param UsefulLink $useful_link
     * @return bool
     */
    public function store(User $user, UsefulLink $useful_link)
    {
        return true;
    }


    /**
     * Determine if the given user can show the given useful_link.
     *
     * @param User $user
     * @param UsefulLink $useful_link
     * @return bool
     */
    public function show(User $user, UsefulLink $useful_link)
    {
        // if($user->hasRole('admin')) return true;
        // show only for the owner
        // if($useful_link->private == 1){
        //     return $user->id == $useful_link->created_by;
        // }else{
        //   return true;
        // }
        return true;
    }

    /**
     * Determine if the given user can edit the given useful_link.
     *
     * @param User $user
     * @param UsefulLink $useful_link
     * @return bool
     */
    public function edit(User $user, UsefulLink $useful_link)
    {
        // if($user->hasRole('admin')) return true;
        // return $user->id == $useful_link->created_by;
        return true;
    }


    /**
     * Determine if the given user can update the given useful_link.
     *
     * @param User $user
     * @param UsefulLink $useful_link
     * @return bool
     */
    public function update(User $user, UsefulLink $useful_link)
    {
        // if($user->hasRole('admin')) return true;
        // return $user->id == $useful_link->created_by;
        return true;
    }


    /**
     * Determine if the given user can delete the given useful_link.
     *
     * @param User $user
     * @param UsefulLink $useful_link
     * @return bool
     */
    public function destroy(User $user, UsefulLink $useful_link)
    {
        // if($user->hasRole('admin')) return true;
        // return $user->id == $useful_link->created_by;
        return true;
    }

    /**
     * Determine if the given user can see data.
     *
     * @param User $user
     * @param UsefulLink $useful_link
     * @return bool
     */
    public function datatables(User $user, UsefulLink $useful_link)
    {
        // if($user->hasRole('admin')) return true;
        return true;
    }

}
