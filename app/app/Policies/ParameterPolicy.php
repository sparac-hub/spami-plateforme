<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;

use App\Models\Cms\User;
use App\Models\Cms\Parameter;

// IMPORTANT! Add this to AuthServiceProvider:
// 'App\Models\Cms\Parameter' => 'App\Policies\ParameterPolicy',
class ParameterPolicy
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
     * @param Parameter $parameter
     * @return bool
     */
    public function index(User $user, Parameter $parameter)
    {
        return true;
    }

    /**
     * Determine if the given user can create.
     *
     * @param User $user
     * @param Parameter $parameter
     * @return bool
     */
    public function create(User $user, Parameter $parameter)
    {
        return true;
    }


    /**
     * Determine if the given user can create.
     *
     * @param User $user
     * @param Parameter $parameter
     * @return bool
     */
    public function store(User $user, Parameter $parameter)
    {
        return true;
    }


    /**
     * Determine if the given user can show the given parameter.
     *
     * @param User $user
     * @param Parameter $parameter
     * @return bool
     */
    public function show(User $user, Parameter $parameter)
    {
        // if($user->hasRole('admin')) return true;
        // show only for the owner
        // if($parameter->private == 1){
        //     return $user->id == $parameter->created_by;
        // }else{
        //   return true;
        // }
        return true;
    }

    /**
     * Determine if the given user can edit the given parameter.
     *
     * @param User $user
     * @param Parameter $parameter
     * @return bool
     */
    public function edit(User $user, Parameter $parameter)
    {
        // if($user->hasRole('admin')) return true;
        // return $user->id == $parameter->created_by;
        return true;
    }


    /**
     * Determine if the given user can update the given parameter.
     *
     * @param User $user
     * @param Parameter $parameter
     * @return bool
     */
    public function update(User $user, Parameter $parameter)
    {
        // if($user->hasRole('admin')) return true;
        // return $user->id == $parameter->created_by;
        return true;
    }


    /**
     * Determine if the given user can delete the given parameter.
     *
     * @param User $user
     * @param Parameter $parameter
     * @return bool
     */
    public function destroy(User $user, Parameter $parameter)
    {
        // if($user->hasRole('admin')) return true;
        // return $user->id == $parameter->created_by;
        return true;
    }

    /**
     * Determine if the given user can see data.
     *
     * @param User $user
     * @param Parameter $parameter
     * @return bool
     */
    public function datatables(User $user, Parameter $parameter)
    {
        // if($user->hasRole('admin')) return true;
        return true;
    }

}
