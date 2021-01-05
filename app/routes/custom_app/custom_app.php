<?php

// Front routes got to be translated => SEO : Search Engine Optimization
Route::group(['namespace' => 'CustomApp', 'middleware' => ['auth', 'redirect.locale']], function () use ($locales) {

    foreach ($locales as $locale):

        if (!app()->redirectDefaultLocale) {
            $locale_prefix = ($locale == locale()) ? '/' : $locale;
        }

        Route::group(['prefix' => $locale_prefix ?? $locale], function () use ($locale) {
            Route::group(['as' => $locale . '.'], function () use ($locale) {

                // Espace User

                Route::group(['prefix' => 'espace-user', 'namespace' => 'User'], function () {

                    Route::get('home', 'DashboardController@index')->name('custom_app.dashboard.index'); // en/espace-user/home

                });

                // Espace Acheteur Public

                // Espace Commission d'exclusion

                // Espace COSEM

                // Espace CSCAMP


            });
        });

    endforeach;

});
