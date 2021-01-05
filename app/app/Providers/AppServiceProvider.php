<?php

namespace App\Providers;


use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // As long as you are running MySQL v5.7.7 and higher you do not need to set default string length.
        Schema::defaultStringLength(191);

        $this->googleRecaptchaValidator();

        $this->updateConfig();

        $this->setUpMigrationPaths();

        $this->app->bind('redirectDefaultLocale', function () {
            return config('cms.redirect_default_locale');
        });
    }

    public function googleRecaptchaValidator()
    {
        Validator::extend('recaptcha', 'App\Rules\ReCaptcha@validate');
    }

    public function updateConfig()
    {
        Config::set('app.name', get_cached_parameters('website_name'));
    }

    public function setUpMigrationPaths()
    {
        $migrations_paths = [
            database_path('migrations' . DIRECTORY_SEPARATOR . "cms"),
            database_path('migrations' . DIRECTORY_SEPARATOR . "custom_app"),
            database_path('migrations'),
        ];

        $this->loadMigrationsFrom($migrations_paths);
    }
}
