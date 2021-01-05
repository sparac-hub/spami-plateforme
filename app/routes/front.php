<?php

Route::group(['as' => 'front.', 'namespace' => 'Front'], function () {

    Route::get('/', 'HomeController@index')->name('home');

    Route::get('governorates/get-by-country/{id}',
        'GovernoratesController@getByCountry')->name('governorates.get_by_country');
    Route::get('cities/get-by-governorate/{id}',
        'CitiesController@getByGovernorate')->name('cities.get_by_governorate');
    Route::get('zones/get-by-city/{id}',
        'ZonesController@getByCity')->name('zones.get_by_city');
    Route::get('zones/get-by-governorate/{id}',
        'ZonesController@getByGovernorate')->name('zones.get_by_governorate');
    Route::get('programs/get-by-program',
        'ProgramsController@getByProgram')->name('programs.get_by_program');
    Route::get('aspims/get-by-aspim',
        'AspimsController@getByAspim')->name('aspims.get_by_aspim');
    Route::get('{menu_slug}/get-aspims-by-country',
        'AspimsController@getAspimsByCountry')->name('aspims.get_aspim_by_country');

    Route::post('contact-message',
        'ContactMessagesController@submit')->name('contact_messages.submit');
    Route::post('/newsletter-subscriptions',
        'NewsletterSubscriptionsController@store')->name('newsletter_subscriptions.store');

    Route::get('submit/{slug}/success',
        'ContactMessagesController@success')->name('contact_messages.success');

    Route::get('{menu_slug}/category/{slug}', 'RoutesController@category')
        ->name('routes.category');

    Route::get('{menu_slug}/filter', 'RoutesController@filter')
        ->name('routes.filter');

    Route::get('{menu_slug}/map', 'RoutesController@map')
        ->name('routes.map');

    Route::get('{menu_slug}/{slug}', 'RoutesController@show')
        ->name('routes.show');

    Route::get('{menu_slug}', 'RoutesController@index')
        ->name('routes.index');

    // Front routes got to be translated => SEO : Search Engine Optimization
    /*
        foreach (menu_translations_with_slug() as $menu_translation) {

            $module_ref = $menu_translation->menu->module->reference??'';

            $controllerClass = $menu_translation->menu->module->front_controller_with_namespace ?? '';

            if (class_exists('App\Http\Controllers\\' . $controllerClass)) {

                // Todo: Make urls translatable : __('og.routes.category')

                Route::get('{menu_slug}/category/{slug}', $controllerClass . '@category')
                    ->name($module_ref . '.category');

                Route::get('{menu_slug}/filter', $controllerClass . '@filter')
                    ->name($module_ref . '.filter');

                Route::get('{menu_slug}/{slug}', $controllerClass . '@show')
                    ->name($module_ref . '.show');

                Route::get('{menu_slug}', $controllerClass . '@index')
                    ->name($module_ref . '.index');
            }

        }*/
});

