<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;

use App\Models\Cms\User;
use App\Models\Cms\Governorate;

// IMPORTANT! Add this to AuthServiceProvider:
// 'App\Models\Cms\Governorate' => 'App\Policies\GovernoratePolicy',
class GovernoratePolicy
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
     * @param Governorate $governorate
     * @return bool
     */
    public function index(User $user, Governorate $governorate)
    {
        return true;
    }

    /**
     * Determine if the given user can create.
     *
     * @param User $user
     * @param Governorate $governorate
     * @return bool
     */
    public function create(User $user, Governorate $governorate)
    {
        return true;
    }


    /**
     * Determine if the given user can create.
     *
     * @param User $user
     * @param Governorate $governorate
     * @return bool
     */
    public function store(User $user, Governorate $governorate)
    {
        return true;
    }


    /**
     * Determine if the given user can show the given governorate.
     *
     * @param User $user
     * @param Governorate $governorate
     * @return bool
     */
    public function show(User $user, Governorate $governorate)
    {
        // if($user->hasRole('admin')) return true;
        // show only for the owner
        // if($governorate->private == 1){
        //     return $user->id == $governorate->created_by;
        // }else{
        //   return true;
        // }
        return true;
    }

    /**
     * Determine if the given user can edit the given governorate.
     *
     * @param User $user
     * @param Governorate $governorate
     * @return bool
     */
    public function edit(User $user, Governorate $governorate)
    {
        // if($user->hasRole('admin')) return true;
        // return $user->id == $governorate->created_by;
        return true;
    }


    /**
     * Determine if the given user can update the given governorate.
     *
     * @param User $user
     * @param Governorate $governorate
     * @return bool
     */
    public function update(User $user, Governorate $governorate)
    {
        // if($user->hasRole('admin')) return true;
        // return $user->id == $governorate->created_by;
        return true;
    }


    /**
     * Determine if the given user can delete the given governorate.
     *
     * @param User $user
     * @param Governorate $governorate
     * @return bool
     */
    public function destroy(User $user, Governorate $governorate)
    {
        // if($user->hasRole('admin')) return true;
        // return $user->id == $governorate->created_by;
        return true;
    }

    /**
     * Determine if the given user can see data.
     *
     * @param User $user
     * @param Governorate $governorate
     * @return bool
     */
    public function datatables(User $user, Governorate $governorate)
    {
        // if($user->hasRole('admin')) return true;
        return true;
    }

}
