<?php

namespace App\Observers;

use App\Models\Cms\Parameter;

class ParameterObserver
{
    // All functions : creating, created, updating, updated, deleting, deleted, saving, saved, restoring, restored

    // ! important: Add these to your: AppServiceProvider.php
    // use App\Models\Cms\Parameter;
    // use App\Observers\ParameterObserver;
    // Parameter::observe(ParameterObserver::class);

    /**
     * Listen to the Parameter created event.
     *
     * @param Parameter $parameter
     * @return  void
     */
    public function created(Parameter $parameter)
    {
        //
    }

    /**
     * Listen to the Parameter deleting event.
     *
     * @param Parameter $parameter
     * @return  void
     */
    public function deleting(Parameter $parameter)
    {
        //
    }
}
