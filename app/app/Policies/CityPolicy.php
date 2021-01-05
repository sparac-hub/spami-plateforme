<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;

use App\Models\Cms\User;
use App\Models\Cms\City;

// IMPORTANT! Add this to AuthServiceProvider:
// 'App\Models\Cms\City' => 'App\Policies\CityPolicy',
class CityPolicy
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
     * @param City $city
     * @return bool
     */
    public function index(User $user, City $city)
    {
        return true;
    }

    /**
     * Determine if the given user can create.
     *
     * @param User $user
     * @param City $city
     * @return bool
     */
    public function create(User $user, City $city)
    {
        return true;
    }


    /**
     * Determine if the given user can create.
     *
     * @param User $user
     * @param City $city
     * @return bool
     */
    public function store(User $user, City $city)
    {
        return true;
    }


    /**
     * Determine if the given user can show the given city.
     *
     * @param User $user
     * @param City $city
     * @return bool
     */
    public function show(User $user, City $city)
    {
        // if($user->hasRole('admin')) return true;
        // show only for the owner
        // if($city->private == 1){
        //     return $user->id == $city->created_by;
        // }else{
        //   return true;
        // }
        return true;
    }

    /**
     * Determine if the given user can edit the given city.
     *
     * @param User $user
     * @param City $city
     * @return bool
     */
    public function edit(User $user, City $city)
    {
        // if($user->hasRole('admin')) return true;
        // return $user->id == $city->created_by;
        return true;
    }


    /**
     * Determine if the given user can update the given city.
     *
     * @param User $user
     * @param City $city
     * @return bool
     */
    public function update(User $user, City $city)
    {
        // if($user->hasRole('admin')) return true;
        // return $user->id == $city->created_by;
        return true;
    }


    /**
     * Determine if the given user can delete the given city.
     *
     * @param User $user
     * @param City $city
     * @return bool
     */
    public function destroy(User $user, City $city)
    {
        // if($user->hasRole('admin')) return true;
        // return $user->id == $city->created_by;
        return true;
    }

    /**
     * Determine if the given user can see data.
     *
     * @param User $user
     * @param City $city
     * @return bool
     */
    public function datatables(User $user, City $city)
    {
        // if($user->hasRole('admin')) return true;
        return true;
    }

}
