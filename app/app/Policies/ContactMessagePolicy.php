<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;

use App\Models\Cms\User;
use App\Models\Cms\ContactMessage;

// IMPORTANT! Add this to AuthServiceProvider:
// 'App\Models\Cms\ContactMessage' => 'App\Policies\ContactMessagePolicy',
class ContactMessagePolicy
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
     * @param ContactMessage $contact_message
     * @return bool
     */
    public function index(User $user, ContactMessage $contact_message)
    {
        return true;
    }

    /**
     * Determine if the given user can create.
     *
     * @param User $user
     * @param ContactMessage $contact_message
     * @return bool
     */
    public function create(User $user, ContactMessage $contact_message)
    {
        return true;
    }


    /**
     * Determine if the given user can create.
     *
     * @param User $user
     * @param ContactMessage $contact_message
     * @return bool
     */
    public function store(User $user, ContactMessage $contact_message)
    {
        return true;
    }


    /**
     * Determine if the given user can show the given contact.
     *
     * @param User $user
     * @param ContactMessage $contact_message
     * @return bool
     */
    public function show(User $user, ContactMessage $contact_message)
    {
        // if($user->hasRole('admin')) return true;
        // show only for the owner
        // if($contact_message->private == 1){
        //     return $user->id == $contact_message->created_by;
        // }else{
        //   return true;
        // }
        return true;
    }

    /**
     * Determine if the given user can edit the given contact.
     *
     * @param User $user
     * @param ContactMessage $contact_message
     * @return bool
     */
    public function edit(User $user, ContactMessage $contact_message)
    {
        // if($user->hasRole('admin')) return true;
        // return $user->id == $contact_message->created_by;
        return true;
    }


    /**
     * Determine if the given user can update the given contact.
     *
     * @param User $user
     * @param ContactMessage $contact_message
     * @return bool
     */
    public function update(User $user, ContactMessage $contact_message)
    {
        // if($user->hasRole('admin')) return true;
        // return $user->id == $contact_message->created_by;
        return true;
    }


    /**
     * Determine if the given user can delete the given contact.
     *
     * @param User $user
     * @param ContactMessage $contact_message
     * @return bool
     */
    public function destroy(User $user, ContactMessage $contact_message)
    {
        // if($user->hasRole('admin')) return true;
        // return $user->id == $contact_message->created_by;
        return true;
    }

    /**
     * Determine if the given user can see data.
     *
     * @param User $user
     * @param ContactMessage $contact_message
     * @return bool
     */
    public function datatables(User $user, ContactMessage $contact_message)
    {
        // if($user->hasRole('admin')) return true;
        return true;
    }

}
