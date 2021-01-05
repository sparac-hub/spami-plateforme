<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;

use App\Models\Cms\User;
use App\Models\Cms\MenuBanner;

// IMPORTANT! Add this to AuthServiceProvider:
// 'App\Models\Cms\MenuBanner' => 'App\Policies\MenuBannerPolicy',
class MenuBannerPolicy
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
     * @param MenuBanner $menu_banner
     * @return bool
     */
    public function index(User $user, MenuBanner $menu_banner)
    {
        return true;
    }

    /**
     * Determine if the given user can create.
     *
     * @param User $user
     * @param MenuBanner $menu_banner
     * @return bool
     */
    public function create(User $user, MenuBanner $menu_banner)
    {
        return true;
    }


    /**
     * Determine if the given user can create.
     *
     * @param User $user
     * @param MenuBanner $menu_banner
     * @return bool
     */
    public function store(User $user, MenuBanner $menu_banner)
    {
        return true;
    }


    /**
     * Determine if the given user can show the given menu_banner.
     *
     * @param User $user
     * @param MenuBanner $menu_banner
     * @return bool
     */
    public function show(User $user, MenuBanner $menu_banner)
    {
        // if($user->hasRole('admin')) return true;
        // show only for the owner
        // if($menu_banner->private == 1){
        //     return $user->id == $menu_banner->created_by;
        // }else{
        //   return true;
        // }
        return true;
    }

    /**
     * Determine if the given user can edit the given menu_banner.
     *
     * @param User $user
     * @param MenuBanner $menu_banner
     * @return bool
     */
    public function edit(User $user, MenuBanner $menu_banner)
    {
        // if($user->hasRole('admin')) return true;
        // return $user->id == $menu_banner->created_by;
        return true;
    }


    /**
     * Determine if the given user can update the given menu_banner.
     *
     * @param User $user
     * @param MenuBanner $menu_banner
     * @return bool
     */
    public function update(User $user, MenuBanner $menu_banner)
    {
        // if($user->hasRole('admin')) return true;
        // return $user->id == $menu_banner->created_by;
        return true;
    }


    /**
     * Determine if the given user can delete the given menu_banner.
     *
     * @param User $user
     * @param MenuBanner $menu_banner
     * @return bool
     */
    public function destroy(User $user, MenuBanner $menu_banner)
    {
        // if($user->hasRole('admin')) return true;
        // return $user->id == $menu_banner->created_by;
        return true;
    }

    /**
     * Determine if the given user can see data.
     *
     * @param User $user
     * @param MenuBanner $menu_banner
     * @return bool
     */
    public function datatables(User $user, MenuBanner $menu_banner)
    {
        // if($user->hasRole('admin')) return true;
        return true;
    }

}
