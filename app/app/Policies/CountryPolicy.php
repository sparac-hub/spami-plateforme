<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;

use App\Models\Cms\User;
use App\Models\Cms\Country;

// IMPORTANT! Add this to AuthServiceProvider:
// 'App\Models\Cms\Country' => 'App\Policies\CountryPolicy',
class CountryPolicy
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
     * @param Country $country
     * @return bool
     */
    public function index(User $user, Country $country)
    {
        return true;
    }

    /**
     * Determine if the given user can create.
     *
     * @param User $user
     * @param Country $country
     * @return bool
     */
    public function create(User $user, Country $country)
    {
        return true;
    }


    /**
     * Determine if the given user can create.
     *
     * @param User $user
     * @param Country $country
     * @return bool
     */
    public function store(User $user, Country $country)
    {
        return true;
    }


    /**
     * Determine if the given user can show the given country.
     *
     * @param User $user
     * @param Country $country
     * @return bool
     */
    public function show(User $user, Country $country)
    {
        // if($user->hasRole('admin')) return true;
        // show only for the owner
        // if($country->private == 1){
        //     return $user->id == $country->created_by;
        // }else{
        //   return true;
        // }
        return true;
    }

    /**
     * Determine if the given user can edit the given country.
     *
     * @param User $user
     * @param Country $country
     * @return bool
     */
    public function edit(User $user, Country $country)
    {
        // if($user->hasRole('admin')) return true;
        // return $user->id == $country->created_by;
        return true;
    }


    /**
     * Determine if the given user can update the given country.
     *
     * @param User $user
     * @param Country $country
     * @return bool
     */
    public function update(User $user, Country $country)
    {
        // if($user->hasRole('admin')) return true;
        // return $user->id == $country->created_by;
        return true;
    }


    /**
     * Determine if the given user can delete the given country.
     *
     * @param User $user
     * @param Country $country
     * @return bool
     */
    public function destroy(User $user, Country $country)
    {
        // if($user->hasRole('admin')) return true;
        // return $user->id == $country->created_by;
        return true;
    }

    /**
     * Determine if the given user can see data.
     *
     * @param User $user
     * @param Country $country
     * @return bool
     */
    public function datatables(User $user, Country $country)
    {
        // if($user->hasRole('admin')) return true;
        return true;
    }

}
