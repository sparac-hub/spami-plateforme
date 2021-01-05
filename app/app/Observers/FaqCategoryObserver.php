<?php

namespace App\Observers;

use App\Models\Cms\FaqCategory;

class FaqCategoryObserver
{
    // All functions : creating, created, updating, updated, deleting, deleted, saving, saved, restoring, restored

    // ! important: Add these to your: AppServiceProvider.php
    // use App\Models\Cms\FaqCategory;
    // use App\Observers\FaqCategoryObserver;
    // FaqCategory::observe(FaqCategoryObserver::class);

    /**
     * Listen to the FaqCategory created event.
     *
     * @param FaqCategory $faq_category
     * @return  void
     */
    public function created(FaqCategory $faq_category)
    {
        //
    }

    /**
     * Listen to the FaqCategory deleting event.
     *
     * @param FaqCategory $faq_category
     * @return  void
     */
    public function deleting(FaqCategory $faq_category)
    {
        //
    }
}
