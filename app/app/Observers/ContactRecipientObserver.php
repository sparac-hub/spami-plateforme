<?php

namespace App\Observers;

use App\Models\Cms\ContactRecipient;

class ContactRecipientObserver
{
    // All functions : creating, created, updating, updated, deleting, deleted, saving, saved, restoring, restored

    // ! important: Add these to your: AppServiceProvider.php
    // use App\Models\Cms\ContactRecipient;
    // use App\Observers\ContactRecipientObserver;
    // ContactRecipient::observe(ContactRecipientObserver::class);

    /**
     * Listen to the ContactRecipient created event.
     *
     * @param ContactRecipient $contact_recipient
     * @return  void
     */
    public function created(ContactRecipient $contact_recipient)
    {
        //
    }

    /**
     * Listen to the ContactRecipient deleting event.
     *
     * @param ContactRecipient $contact_recipient
     * @return  void
     */
    public function deleting(ContactRecipient $contact_recipient)
    {
        //
    }
}
