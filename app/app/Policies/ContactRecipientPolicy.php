<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;

use App\Models\Cms\User;
use App\Models\Cms\ContactRecipient;

// IMPORTANT! Add this to AuthServiceProvider:
// 'App\Models\Cms\ContactRecipient' => 'App\Policies\ContactRecipientPolicy',
class ContactRecipientPolicy
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
     * @param ContactRecipient $contact_recipient
     * @return bool
     */
    public function index(User $user, ContactRecipient $contact_recipient)
    {
        return true;
    }

    /**
     * Determine if the given user can create.
     *
     * @param User $user
     * @param ContactRecipient $contact_recipient
     * @return bool
     */
    public function create(User $user, ContactRecipient $contact_recipient)
    {
        return true;
    }


    /**
     * Determine if the given user can create.
     *
     * @param User $user
     * @param ContactRecipient $contact_recipient
     * @return bool
     */
    public function store(User $user, ContactRecipient $contact_recipient)
    {
        return true;
    }


    /**
     * Determine if the given user can show the given contact_recipient.
     *
     * @param User $user
     * @param ContactRecipient $contact_recipient
     * @return bool
     */
    public function show(User $user, ContactRecipient $contact_recipient)
    {
        // if($user->hasRole('admin')) return true;
        // show only for the owner
        // if($contact_recipient->private == 1){
        //     return $user->id == $contact_recipient->created_by;
        // }else{
        //   return true;
        // }
        return true;
    }

    /**
     * Determine if the given user can edit the given contact_recipient.
     *
     * @param User $user
     * @param ContactRecipient $contact_recipient
     * @return bool
     */
    public function edit(User $user, ContactRecipient $contact_recipient)
    {
        // if($user->hasRole('admin')) return true;
        // return $user->id == $contact_recipient->created_by;
        return true;
    }


    /**
     * Determine if the given user can update the given contact_recipient.
     *
     * @param User $user
     * @param ContactRecipient $contact_recipient
     * @return bool
     */
    public function update(User $user, ContactRecipient $contact_recipient)
    {
        // if($user->hasRole('admin')) return true;
        // return $user->id == $contact_recipient->created_by;
        return true;
    }


    /**
     * Determine if the given user can delete the given contact_recipient.
     *
     * @param User $user
     * @param ContactRecipient $contact_recipient
     * @return bool
     */
    public function destroy(User $user, ContactRecipient $contact_recipient)
    {
        // if($user->hasRole('admin')) return true;
        // return $user->id == $contact_recipient->created_by;
        return true;
    }

    /**
     * Determine if the given user can see data.
     *
     * @param User $user
     * @param ContactRecipient $contact_recipient
     * @return bool
     */
    public function datatables(User $user, ContactRecipient $contact_recipient)
    {
        // if($user->hasRole('admin')) return true;
        return true;
    }

}
