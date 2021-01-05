<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;

use App\Models\Cms\User;
use App\Models\Cms\FaqCategory;

// IMPORTANT! Add this to AuthServiceProvider:
// 'App\Models\Cms\FaqCategory' => 'App\Policies\FaqCategoryPolicy',
class FaqCategoryPolicy
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
     * @param FaqCategory $faq_category
     * @return bool
     */
    public function index(User $user, FaqCategory $faq_category)
    {
        return true;
    }

    /**
     * Determine if the given user can create.
     *
     * @param User $user
     * @param FaqCategory $faq_category
     * @return bool
     */
    public function create(User $user, FaqCategory $faq_category)
    {
        return true;
    }


    /**
     * Determine if the given user can create.
     *
     * @param User $user
     * @param FaqCategory $faq_category
     * @return bool
     */
    public function store(User $user, FaqCategory $faq_category)
    {
        return true;
    }


    /**
     * Determine if the given user can show the given faq_category.
     *
     * @param User $user
     * @param FaqCategory $faq_category
     * @return bool
     */
    public function show(User $user, FaqCategory $faq_category)
    {
        // if($user->hasRole('admin')) return true;
        // show only for the owner
        // if($faq_category->private == 1){
        //     return $user->id == $faq_category->created_by;
        // }else{
        //   return true;
        // }
        return true;
    }

    /**
     * Determine if the given user can edit the given faq_category.
     *
     * @param User $user
     * @param FaqCategory $faq_category
     * @return bool
     */
    public function edit(User $user, FaqCategory $faq_category)
    {
        // if($user->hasRole('admin')) return true;
        // return $user->id == $faq_category->created_by;
        return true;
    }


    /**
     * Determine if the given user can update the given faq_category.
     *
     * @param User $user
     * @param FaqCategory $faq_category
     * @return bool
     */
    public function update(User $user, FaqCategory $faq_category)
    {
        // if($user->hasRole('admin')) return true;
        // return $user->id == $faq_category->created_by;
        return true;
    }


    /**
     * Determine if the given user can delete the given faq_category.
     *
     * @param User $user
     * @param FaqCategory $faq_category
     * @return bool
     */
    public function destroy(User $user, FaqCategory $faq_category)
    {
        // if($user->hasRole('admin')) return true;
        // return $user->id == $faq_category->created_by;
        return true;
    }

    /**
     * Determine if the given user can see data.
     *
     * @param User $user
     * @param FaqCategory $faq_category
     * @return bool
     */
    public function datatables(User $user, FaqCategory $faq_category)
    {
        // if($user->hasRole('admin')) return true;
        return true;
    }

}
