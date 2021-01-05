<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;

use App\Models\Cms\User;
use App\Models\Cms\Language;

// IMPORTANT! Add this to AuthServiceProvider:
// 'App\Models\Cms\Language' => 'App\Policies\LanguagePolicy',
class LanguagePolicy
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
     * @param Language $language
     * @return bool
     */
    public function index(User $user, Language $language)
    {
        return true;
    }

    /**
     * Determine if the given user can create.
     *
     * @param User $user
     * @param Language $language
     * @return bool
     */
    public function create(User $user, Language $language)
    {
        return true;
    }


    /**
     * Determine if the given user can create.
     *
     * @param User $user
     * @param Language $language
     * @return bool
     */
    public function store(User $user, Language $language)
    {
        return true;
    }


    /**
     * Determine if the given user can show the given language.
     *
     * @param User $user
     * @param Language $language
     * @return bool
     */
    public function show(User $user, Language $language)
    {
        // if($user->hasRole('admin')) return true;
        // show only for the owner
        // if($language->private == 1){
        //     return $user->id == $language->created_by;
        // }else{
        //   return true;
        // }
        return true;
    }

    /**
     * Determine if the given user can edit the given language.
     *
     * @param User $user
     * @param Language $language
     * @return bool
     */
    public function edit(User $user, Language $language)
    {
        // if($user->hasRole('admin')) return true;
        // return $user->id == $language->created_by;
        return true;
    }


    /**
     * Determine if the given user can update the given language.
     *
     * @param User $user
     * @param Language $language
     * @return bool
     */
    public function update(User $user, Language $language)
    {
        // if($user->hasRole('admin')) return true;
        // return $user->id == $language->created_by;
        return true;
    }


    /**
     * Determine if the given user can delete the given language.
     *
     * @param User $user
     * @param Language $language
     * @return bool
     */
    public function destroy(User $user, Language $language)
    {
        // if($user->hasRole('admin')) return true;
        // return $user->id == $language->created_by;
        return true;
    }

    /**
     * Determine if the given user can see data.
     *
     * @param User $user
     * @param Language $language
     * @return bool
     */
    public function datatables(User $user, Language $language)
    {
        // if($user->hasRole('admin')) return true;
        return true;
    }

}
