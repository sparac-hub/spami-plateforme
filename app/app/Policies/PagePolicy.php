<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;

use App\Models\Cms\User;
use App\Models\Cms\Page;

// IMPORTANT! Add this to AuthServiceProvider:
// 'App\Models\Cms\Page' => 'App\Policies\PagePolicy',
class PagePolicy
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
     * @param Page $page
     * @return bool
     */
    public function index(User $user, Page $page)
    {
        return true;
    }

    /**
     * Determine if the given user can create.
     *
     * @param User $user
     * @param Page $page
     * @return bool
     */
    public function create(User $user, Page $page)
    {
        return true;
    }


    /**
     * Determine if the given user can create.
     *
     * @param User $user
     * @param Page $page
     * @return bool
     */
    public function store(User $user, Page $page)
    {
        return true;
    }


    /**
     * Determine if the given user can show the given page.
     *
     * @param User $user
     * @param Page $page
     * @return bool
     */
    public function show(User $user, Page $page)
    {
        // if($user->hasRole('admin')) return true;
        // show only for the owner
        // if($page->private == 1){
        //     return $user->id == $page->created_by;
        // }else{
        //   return true;
        // }
        return true;
    }

    /**
     * Determine if the given user can edit the given page.
     *
     * @param User $user
     * @param Page $page
     * @return bool
     */
    public function edit(User $user, Page $page)
    {
        // if($user->hasRole('admin')) return true;
        // return $user->id == $page->created_by;
        return true;
    }


    /**
     * Determine if the given user can update the given page.
     *
     * @param User $user
     * @param Page $page
     * @return bool
     */
    public function update(User $user, Page $page)
    {
        // if($user->hasRole('admin')) return true;
        // return $user->id == $page->created_by;
        return true;
    }


    /**
     * Determine if the given user can delete the given page.
     *
     * @param User $user
     * @param Page $page
     * @return bool
     */
    public function destroy(User $user, Page $page)
    {
        // if($user->hasRole('admin')) return true;
        // return $user->id == $page->created_by;
        return true;
    }

    /**
     * Determine if the given user can see data.
     *
     * @param User $user
     * @param Page $page
     * @return bool
     */
    public function datatables(User $user, Page $page)
    {
        // if($user->hasRole('admin')) return true;
        return true;
    }

}
