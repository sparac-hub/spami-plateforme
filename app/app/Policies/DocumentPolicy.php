<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;

use App\Models\Cms\User;
use App\Models\Cms\Document;

// IMPORTANT! Add this to AuthServiceProvider:
// 'App\Models\Cms\Document' => 'App\Policies\DocumentPolicy',
class DocumentPolicy
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
     * @param Document $document
     * @return bool
     */
    public function index(User $user, Document $document)
    {
        return true;
    }

    /**
     * Determine if the given user can create.
     *
     * @param User $user
     * @param Document $document
     * @return bool
     */
    public function create(User $user, Document $document)
    {
        return true;
    }


    /**
     * Determine if the given user can create.
     *
     * @param User $user
     * @param Document $document
     * @return bool
     */
    public function store(User $user, Document $document)
    {
        return true;
    }


    /**
     * Determine if the given user can show the given document.
     *
     * @param User $user
     * @param Document $document
     * @return bool
     */
    public function show(User $user, Document $document)
    {
        // if($user->hasRole('admin')) return true;
        // show only for the owner
        // if($document->private == 1){
        //     return $user->id == $document->created_by;
        // }else{
        //   return true;
        // }
        return true;
    }

    /**
     * Determine if the given user can edit the given document.
     *
     * @param User $user
     * @param Document $document
     * @return bool
     */
    public function edit(User $user, Document $document)
    {
        // if($user->hasRole('admin')) return true;
        // return $user->id == $document->created_by;
        return true;
    }


    /**
     * Determine if the given user can update the given document.
     *
     * @param User $user
     * @param Document $document
     * @return bool
     */
    public function update(User $user, Document $document)
    {
        // if($user->hasRole('admin')) return true;
        // return $user->id == $document->created_by;
        return true;
    }


    /**
     * Determine if the given user can delete the given document.
     *
     * @param User $user
     * @param Document $document
     * @return bool
     */
    public function destroy(User $user, Document $document)
    {
        // if($user->hasRole('admin')) return true;
        // return $user->id == $document->created_by;
        return true;
    }

    /**
     * Determine if the given user can see data.
     *
     * @param User $user
     * @param Document $document
     * @return bool
     */
    public function datatables(User $user, Document $document)
    {
        // if($user->hasRole('admin')) return true;
        return true;
    }

}
