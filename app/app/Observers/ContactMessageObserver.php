<?php

namespace App\Observers;

use App\Models\Cms\ContactMessage;

class ContactMessageObserver
{
    // All functions : creating, created, updating, updated, deleting, deleted, saving, saved, restoring, restored

    // ! important: Add these to your: AppServiceProvider.php
    // use App\Contact;
    // use App\Observers\ContactObserver;
    // Contact::observe(ContactObserver::class);

    /**
     * Listen to the Contact created event.
     *
     * @param ContactMessage $contact
     * @return  void
     */
    public function created(ContactMessage $contact)
    {
        //
    }

    /**
     * Listen to the Contact deleting event.
     *
     * @param ContactMessage $contact
     * @return  void
     */
    public function deleting(ContactMessage $contact)
    {
        //
    }
}
