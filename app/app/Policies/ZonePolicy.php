<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;

use App\Models\Cms\User;
use App\Models\Cms\Zone;

// IMPORTANT! Add this to AuthServiceProvider:
// 'App\Models\Cms\Zone' => 'App\Policies\ZonePolicy',
class ZonePolicy
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
     * @param Zone $zone
     * @return bool
     */
    public function index(User $user, Zone $zone)
    {
        return true;
    }

    /**
     * Determine if the given user can create.
     *
     * @param User $user
     * @param Zone $zone
     * @return bool
     */
    public function create(User $user, Zone $zone)
    {
        return true;
    }


    /**
     * Determine if the given user can create.
     *
     * @param User $user
     * @param Zone $zone
     * @return bool
     */
    public function store(User $user, Zone $zone)
    {
        return true;
    }


    /**
     * Determine if the given user can show the given zone.
     *
     * @param User $user
     * @param Zone $zone
     * @return bool
     */
    public function show(User $user, Zone $zone)
    {
        // if($user->hasRole('admin')) return true;
        // show only for the owner
        // if($zone->private == 1){
        //     return $user->id == $zone->created_by;
        // }else{
        //   return true;
        // }
        return true;
    }

    /**
     * Determine if the given user can edit the given zone.
     *
     * @param User $user
     * @param Zone $zone
     * @return bool
     */
    public function edit(User $user, Zone $zone)
    {
        // if($user->hasRole('admin')) return true;
        // return $user->id == $zone->created_by;
        return true;
    }


    /**
     * Determine if the given user can update the given zone.
     *
     * @param User $user
     * @param Zone $zone
     * @return bool
     */
    public function update(User $user, Zone $zone)
    {
        // if($user->hasRole('admin')) return true;
        // return $user->id == $zone->created_by;
        return true;
    }


    /**
     * Determine if the given user can delete the given zone.
     *
     * @param User $user
     * @param Zone $zone
     * @return bool
     */
    public function destroy(User $user, Zone $zone)
    {
        // if($user->hasRole('admin')) return true;
        // return $user->id == $zone->created_by;
        return true;
    }

    /**
     * Determine if the given user can see data.
     *
     * @param User $user
     * @param Zone $zone
     * @return bool
     */
    public function datatables(User $user, Zone $zone)
    {
        // if($user->hasRole('admin')) return true;
        return true;
    }

}
