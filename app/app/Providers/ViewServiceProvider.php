<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        // Front
        $this->addComposer('front.layouts.app',
            \App\Http\ViewComposers\Front\WidgetsViewComposer::class);
        $this->addComposer('front.contact_messages.index',
            \App\Http\ViewComposers\Front\WidgetsViewComposer::class);
        $this->addComposer('front.layouts.app',
            \App\Http\ViewComposers\Front\LocalizedUrlViewComposer::class);

        // Back
        $this->addComposer('back.layouts.partials.sidebar',
            \App\Http\ViewComposers\Back\SidebarViewComposer::class);
    }

    protected function addComposer($views, $callback)
    {
        View::composer($views, $callback);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
