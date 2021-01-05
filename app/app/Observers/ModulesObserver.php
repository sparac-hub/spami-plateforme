<?php

namespace App\Observers;

use App\Models\Cms\Modules;

class ModulesObserver
{
    // All functions : creating, created, updating, updated, deleting, deleted, saving, saved, restoring, restored

    // ! important: Add these to your: AppServiceProvider.php
    // use App\Models\Cms\Modules;
    // use App\Observers\ModulesObserver;
    // Modules::observe(ModulesObserver::class);

    /**
     * Listen to the Modules created event.
     *
     * @param Modules $modules
     * @return  void
     */
    public function created(Modules $modules)
    {
        //
    }

    /**
     * Listen to the Modules deleting event.
     *
     * @param Modules $modules
     * @return  void
     */
    public function deleting(Modules $modules)
    {
        //
    }
}
