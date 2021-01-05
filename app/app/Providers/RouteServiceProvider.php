<?php

namespace App\Providers;

use App\Models\Cms\Role;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        //

        parent::boot();
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->mapWebRoutes();

        $this->mapCmsRoutes();

        $this->mapApiRoutes();
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/web.php'));
    }

    public function mapCmsRoutes()
    {
        Route::namespace($this->namespace)->group(function () {

            /*
             * Back site
             */
            Route::namespace('Back')
                ->prefix(locale_prefix() . '/' . config('cms.backend.prefix'))
                ->middleware(['web', 'auth'])
                ->as('back.')
                ->group(function () {
                    Route::middleware('auth')->group(function () {
                        require base_path('routes/back.php');
                    });
                });

            /*
             * Front site
             */
            Route::prefix(locale_prefix())
                ->middleware('web')
                ->group(function () {
                    require base_path('routes/front.php');
                });

        });
    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        Route::prefix('api')
            ->middleware('api')
            ->namespace($this->namespace)
            ->group(base_path('routes/api.php'));
    }
}
