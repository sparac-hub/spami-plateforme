<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;

use App\Models\Cms\User;
use App\Models\Cms\Menu;

// IMPORTANT! Add this to AuthServiceProvider:
// 'App\Models\Cms\Menu' => 'App\Policies\MenuPolicy',
class MenuPolicy
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
     * @param Menu $menu
     * @return bool
     */
    public function index(User $user, Menu $menu)
    {
        return true;
    }

    /**
     * Determine if the given user can create.
     *
     * @param User $user
     * @param Menu $menu
     * @return bool
     */
    public function create(User $user, Menu $menu)
    {
        return true;
    }


    /**
     * Determine if the given user can create.
     *
     * @param User $user
     * @param Menu $menu
     * @return bool
     */
    public function store(User $user, Menu $menu)
    {
        return true;
    }


    /**
     * Determine if the given user can show the given menu.
     *
     * @param User $user
     * @param Menu $menu
     * @return bool
     */
    public function show(User $user, Menu $menu)
    {
        // if($user->hasRole('admin')) return true;
        // show only for the owner
        // if($menu->private == 1){
        //     return $user->id == $menu->created_by;
        // }else{
        //   return true;
        // }
        return true;
    }

    /**
     * Determine if the given user can edit the given menu.
     *
     * @param User $user
     * @param Menu $menu
     * @return bool
     */
    public function edit(User $user, Menu $menu)
    {
        // if($user->hasRole('admin')) return true;
        // return $user->id == $menu->created_by;
        return true;
    }


    /**
     * Determine if the given user can update the given menu.
     *
     * @param User $user
     * @param Menu $menu
     * @return bool
     */
    public function update(User $user, Menu $menu)
    {
        // if($user->hasRole('admin')) return true;
        // return $user->id == $menu->created_by;
        return true;
    }


    /**
     * Determine if the given user can delete the given menu.
     *
     * @param User $user
     * @param Menu $menu
     * @return bool
     */
    public function destroy(User $user, Menu $menu)
    {
        // if($user->hasRole('admin')) return true;
        // return $user->id == $menu->created_by;
        return true;
    }

    /**
     * Determine if the given user can see data.
     *
     * @param User $user
     * @param Menu $menu
     * @return bool
     */
    public function datatables(User $user, Menu $menu)
    {
        // if($user->hasRole('admin')) return true;
        return true;
    }

}
