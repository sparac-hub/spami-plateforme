<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;

use App\Models\Cms\User;
use App\Models\Cms\Banner;

// IMPORTANT! Add this to AuthServiceProvider:
// 'App\Models\Cms\Banner' => 'App\Policies\BannerPolicy',
class BannerPolicy
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
     * @param Banner $banner
     * @return bool
     */
    public function index(User $user, Banner $banner)
    {
        return true;
    }

    /**
     * Determine if the given user can create.
     *
     * @param User $user
     * @param Banner $banner
     * @return bool
     */
    public function create(User $user, Banner $banner)
    {
        return true;
    }


    /**
     * Determine if the given user can create.
     *
     * @param User $user
     * @param Banner $banner
     * @return bool
     */
    public function store(User $user, Banner $banner)
    {
        return true;
    }


    /**
     * Determine if the given user can show the given banner.
     *
     * @param User $user
     * @param Banner $banner
     * @return bool
     */
    public function show(User $user, Banner $banner)
    {
        // if($user->hasRole('admin')) return true;
        // show only for the owner
        // if($banner->private == 1){
        //     return $user->id == $banner->created_by;
        // }else{
        //   return true;
        // }
        return true;
    }

    /**
     * Determine if the given user can edit the given banner.
     *
     * @param User $user
     * @param Banner $banner
     * @return bool
     */
    public function edit(User $user, Banner $banner)
    {
        // if($user->hasRole('admin')) return true;
        // return $user->id == $banner->created_by;
        return true;
    }


    /**
     * Determine if the given user can update the given banner.
     *
     * @param User $user
     * @param Banner $banner
     * @return bool
     */
    public function update(User $user, Banner $banner)
    {
        // if($user->hasRole('admin')) return true;
        // return $user->id == $banner->created_by;
        return true;
    }


    /**
     * Determine if the given user can delete the given banner.
     *
     * @param User $user
     * @param Banner $banner
     * @return bool
     */
    public function destroy(User $user, Banner $banner)
    {
        // if($user->hasRole('admin')) return true;
        // return $user->id == $banner->created_by;
        return true;
    }

    /**
     * Determine if the given user can see data.
     *
     * @param User $user
     * @param Banner $banner
     * @return bool
     */
    public function datatables(User $user, Banner $banner)
    {
        // if($user->hasRole('admin')) return true;
        return true;
    }

}
