<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;

use App\Models\Cms\User;
use App\Models\Cms\NewsletterSubscription;

// IMPORTANT! Add this to AuthServiceProvider:
// 'App\Models\Cms\NewsletterSubscription' => 'App\Policies\NewsletterSubscriptionPolicy',
class NewsletterSubscriptionPolicy
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
     * @param NewsletterSubscription $newsletter_subscription
     * @return bool
     */
    public function index(User $user, NewsletterSubscription $newsletter_subscription)
    {
        return true;
    }

    /**
     * Determine if the given user can create.
     *
     * @param User $user
     * @param NewsletterSubscription $newsletter_subscription
     * @return bool
     */
    public function create(User $user, NewsletterSubscription $newsletter_subscription)
    {
        return true;
    }


    /**
     * Determine if the given user can create.
     *
     * @param User $user
     * @param NewsletterSubscription $newsletter_subscription
     * @return bool
     */
    public function store(User $user, NewsletterSubscription $newsletter_subscription)
    {
        return true;
    }


    /**
     * Determine if the given user can show the given newsletter_subscription.
     *
     * @param User $user
     * @param NewsletterSubscription $newsletter_subscription
     * @return bool
     */
    public function show(User $user, NewsletterSubscription $newsletter_subscription)
    {
        // if($user->hasRole('admin')) return true;
        // show only for the owner
        // if($newsletter_subscription->private == 1){
        //     return $user->id == $newsletter_subscription->created_by;
        // }else{
        //   return true;
        // }
        return true;
    }

    /**
     * Determine if the given user can edit the given newsletter_subscription.
     *
     * @param User $user
     * @param NewsletterSubscription $newsletter_subscription
     * @return bool
     */
    public function edit(User $user, NewsletterSubscription $newsletter_subscription)
    {
        // if($user->hasRole('admin')) return true;
        // return $user->id == $newsletter_subscription->created_by;
        return true;
    }


    /**
     * Determine if the given user can update the given newsletter_subscription.
     *
     * @param User $user
     * @param NewsletterSubscription $newsletter_subscription
     * @return bool
     */
    public function update(User $user, NewsletterSubscription $newsletter_subscription)
    {
        // if($user->hasRole('admin')) return true;
        // return $user->id == $newsletter_subscription->created_by;
        return true;
    }


    /**
     * Determine if the given user can delete the given newsletter_subscription.
     *
     * @param User $user
     * @param NewsletterSubscription $newsletter_subscription
     * @return bool
     */
    public function destroy(User $user, NewsletterSubscription $newsletter_subscription)
    {
        // if($user->hasRole('admin')) return true;
        // return $user->id == $newsletter_subscription->created_by;
        return true;
    }

    /**
     * Determine if the given user can see data.
     *
     * @param User $user
     * @param NewsletterSubscription $newsletter_subscription
     * @return bool
     */
    public function datatables(User $user, NewsletterSubscription $newsletter_subscription)
    {
        // if($user->hasRole('admin')) return true;
        return true;
    }

}
