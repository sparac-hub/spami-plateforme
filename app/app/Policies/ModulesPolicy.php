<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;

use App\Models\Cms\User;
use App\Models\Cms\Modules;

// IMPORTANT! Add this to AuthServiceProvider:
// 'App\Models\Cms\Modules' => 'App\Policies\ModulesPolicy',
class ModulesPolicy
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
     * @param Modules $modules
     * @return bool
     */
    public function index(User $user, Modules $modules)
    {
        return true;
    }

    /**
     * Determine if the given user can create.
     *
     * @param User $user
     * @param Modules $modules
     * @return bool
     */
    public function create(User $user, Modules $modules)
    {
        return true;
    }


    /**
     * Determine if the given user can create.
     *
     * @param User $user
     * @param Modules $modules
     * @return bool
     */
    public function store(User $user, Modules $modules)
    {
        return true;
    }


    /**
     * Determine if the given user can show the given modules.
     *
     * @param User $user
     * @param Modules $modules
     * @return bool
     */
    public function show(User $user, Modules $modules)
    {
        // if($user->hasRole('admin')) return true;
        // show only for the owner
        // if($modules->private == 1){
        //     return $user->id == $modules->created_by;
        // }else{
        //   return true;
        // }
        return true;
    }

    /**
     * Determine if the given user can edit the given modules.
     *
     * @param User $user
     * @param Modules $modules
     * @return bool
     */
    public function edit(User $user, Modules $modules)
    {
        // if($user->hasRole('admin')) return true;
        // return $user->id == $modules->created_by;
        return true;
    }


    /**
     * Determine if the given user can update the given modules.
     *
     * @param User $user
     * @param Modules $modules
     * @return bool
     */
    public function update(User $user, Modules $modules)
    {
        // if($user->hasRole('admin')) return true;
        // return $user->id == $modules->created_by;
        return true;
    }


    /**
     * Determine if the given user can delete the given modules.
     *
     * @param User $user
     * @param Modules $modules
     * @return bool
     */
    public function destroy(User $user, Modules $modules)
    {
        // if($user->hasRole('admin')) return true;
        // return $user->id == $modules->created_by;
        return true;
    }

    /**
     * Determine if the given user can see data.
     *
     * @param User $user
     * @param Modules $modules
     * @return bool
     */
    public function datatables(User $user, Modules $modules)
    {
        // if($user->hasRole('admin')) return true;
        return true;
    }

}
