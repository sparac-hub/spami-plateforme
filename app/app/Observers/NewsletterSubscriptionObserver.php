<?php

namespace App\Observers;

use App\Models\Cms\NewsletterSubscription;

class NewsletterSubscriptionObserver
{
    // All functions : creating, created, updating, updated, deleting, deleted, saving, saved, restoring, restored

    // ! important: Add these to your: AppServiceProvider.php
    // use App\Models\Cms\NewsletterSubscription;
    // use App\Observers\NewsletterSubscriptionObserver;
    // NewsletterSubscription::observe(NewsletterSubscriptionObserver::class);

    /**
     * Listen to the NewsletterSubscription created event.
     *
     * @param NewsletterSubscription $newsletter_subscription
     * @return  void
     */
    public function created(NewsletterSubscription $newsletter_subscription)
    {
        //
    }

    /**
     * Listen to the NewsletterSubscription deleting event.
     *
     * @param NewsletterSubscription $newsletter_subscription
     * @return  void
     */
    public function deleting(NewsletterSubscription $newsletter_subscription)
    {
        //
    }
}
