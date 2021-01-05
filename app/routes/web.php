<?php

require_once 'generate_module.php';

if (count(get_cached_active_locales()) > 0) {
    Route::get('/', 'RedirectionController@redirectToHomepage');
}

Route::group(['prefix' => locale_prefix() . '/' . config('cms.auth.prefix')], function () {

    Route::get(config('cms.auth.login'), 'Auth\LoginController@showLoginForm')->name('login');
    Route::post(config('cms.auth.login'), 'Auth\LoginController@login');
    Route::post('login_forums', 'Auth\LoginForumController@login')->name('login.forums');
    Route::post('logout', 'Auth\LoginController@logout')->name('logout');

    // Registration Routes...
    // Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
    // Route::post('register', 'Auth\RegisterController@register');

    // Password Reset Routes...
    Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
    Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
    Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('post-password.reset');

});


/**
 * Include Common routes between different namespaces
 */

require_once('common/common.php');


/**
 * Include Test/Debug routes
 */

if (config('app.env') == 'local') {
    require_once('test/test.php');
}


/**
 * Include CustomApp routes
 */

//require_once('custom_app/custom_app.php');

Route::fallback('NotFoundController');
