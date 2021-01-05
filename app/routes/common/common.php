<?php

Route::group(['namespace' => 'Common'], function () {

    Route::get('menus/get_by_menu_group_id/{menu_group_id?}', // important: menu_group_id? => used in js => null
        'MenusController@getMenusByMenuGroupId')->name('menus.get_by_menu_group_id');

    Route::post('menus/check_slug',
        'MenusController@checkSlug')->name('menus.check_slug');

    Route::post('menus/check_slug_module',
        'MenusController@checkModuleSlug')->name('menus.check_slug_module');

});

