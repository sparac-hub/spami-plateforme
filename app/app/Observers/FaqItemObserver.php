<?php

namespace App\Observers;

use App\Models\Cms\FaqItem;

class FaqItemObserver
{
    // All functions : creating, created, updating, updated, deleting, deleted, saving, saved, restoring, restored

    // ! important: Add these to your: AppServiceProvider.php
    // use App\Models\Cms\FaqItem;
    // use App\Observers\FaqItemObserver;
    // FaqItem::observe(FaqItemObserver::class);

    /**
     * Listen to the FaqItem created event.
     *
     * @param FaqItem $faq_item
     * @return  void
     */
    public function created(FaqItem $faq_item)
    {
        //
    }

    /**
     * Listen to the FaqItem deleting event.
     *
     * @param FaqItem $faq_item
     * @return  void
     */
    public function deleting(FaqItem $faq_item)
    {
        //
    }
}
