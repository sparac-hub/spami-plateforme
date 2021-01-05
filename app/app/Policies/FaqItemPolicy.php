<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;

use App\Models\Cms\User;
use App\Models\Cms\FaqItem;

// IMPORTANT! Add this to AuthServiceProvider:
// 'App\Models\Cms\FaqItem' => 'App\Policies\FaqItemPolicy',
class FaqItemPolicy
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
     * @param FaqItem $faq_item
     * @return bool
     */
    public function index(User $user, FaqItem $faq_item)
    {
        return true;
    }

    /**
     * Determine if the given user can create.
     *
     * @param User $user
     * @param FaqItem $faq_item
     * @return bool
     */
    public function create(User $user, FaqItem $faq_item)
    {
        return true;
    }


    /**
     * Determine if the given user can create.
     *
     * @param User $user
     * @param FaqItem $faq_item
     * @return bool
     */
    public function store(User $user, FaqItem $faq_item)
    {
        return true;
    }


    /**
     * Determine if the given user can show the given faq_item.
     *
     * @param User $user
     * @param FaqItem $faq_item
     * @return bool
     */
    public function show(User $user, FaqItem $faq_item)
    {
        // if($user->hasRole('admin')) return true;
        // show only for the owner
        // if($faq_item->private == 1){
        //     return $user->id == $faq_item->created_by;
        // }else{
        //   return true;
        // }
        return true;
    }

    /**
     * Determine if the given user can edit the given faq_item.
     *
     * @param User $user
     * @param FaqItem $faq_item
     * @return bool
     */
    public function edit(User $user, FaqItem $faq_item)
    {
        // if($user->hasRole('admin')) return true;
        // return $user->id == $faq_item->created_by;
        return true;
    }


    /**
     * Determine if the given user can update the given faq_item.
     *
     * @param User $user
     * @param FaqItem $faq_item
     * @return bool
     */
    public function update(User $user, FaqItem $faq_item)
    {
        // if($user->hasRole('admin')) return true;
        // return $user->id == $faq_item->created_by;
        return true;
    }


    /**
     * Determine if the given user can delete the given faq_item.
     *
     * @param User $user
     * @param FaqItem $faq_item
     * @return bool
     */
    public function destroy(User $user, FaqItem $faq_item)
    {
        // if($user->hasRole('admin')) return true;
        // return $user->id == $faq_item->created_by;
        return true;
    }

    /**
     * Determine if the given user can see data.
     *
     * @param User $user
     * @param FaqItem $faq_item
     * @return bool
     */
    public function datatables(User $user, FaqItem $faq_item)
    {
        // if($user->hasRole('admin')) return true;
        return true;
    }

}
