<?php

// TODO : add MetaTagsController/MetaTag/meta_tags_views polymorphic relationship (meta_taggable_type/meta_taggable_id) with other models


Route::group(['middleware' => ['role:' . roles_for_route_back_access()]], function () {

    Route::get('menu-module-redirection/{menu_id}', 'MenuModuleRedirectionController')->name('menu-module-redirection');

    Route::group(['middleware' => 'check.permission'], function () {

        Route::get('/', 'DashboardController@index')->name('home');

        Route::resource('front_home', 'FrontHomeController');

        Route::get('pretty-routes', 'RoutesController')->name('routes.index');

        //Todo only admin can clear cache
        Route::get('cache-cleaner', 'CacheCleanerController@index')->name('cache-cleaner.index');
        Route::get('cache-cleaner/clear/{type?}', 'CacheCleanerController@clear')->name('cache-cleaner.clear');

        Route::get('lfm', 'LaravelFileManagerController@index')->name('custom-lfm');

        Route::resource('users', 'UsersController');
        Route::resource('roles', 'RolesController')->except(['create']);
        Route::post('change-permission-status',
            'RolesController@changePermissionStatus')->name('roles.change-permission-status');

        // User profile routes
        Route::get('my-profile',
            'UserProfileController@myProfile')->name('my-profile'); // {{ route('my-profile') }}
        Route::post('update', 'UserProfileController@update')->name('user_profile.update');

        // Todo: generate backend url from database
        Route::post('menu-groups/update-order',
            'MenuGroupsController@updateOrder')->name('menu-groups.update-order');
        Route::get('menus/edit-module', 'MenusController@editModule')->name('menus.edit-module');
        Route::get('menus/datatables', 'MenusController@datatables')->name('menus.datatables');
        Route::post('menus/toggle-status',
            'MenusController@toggleStatus')->name('menus.toggle-status');
        Route::resource('menus', 'MenusController');

        Route::get('locales/datatables',
            'LocalesController@datatables')->name('locales.datatables');
        Route::resource('locales', 'LocalesController');

        Route::get('post_categories/datatables',
            'PostCategoriesController@datatables')->name('post_categories.datatables');
        Route::resource('post_categories', 'PostCategoriesController');

        Route::get('banners/datatables',
            'BannersController@datatables')->name('banners.datatables');
        Route::resource('banners', 'BannersController');

        Route::get('contact_recipients/datatables',
            'ContactRecipientsController@datatables')->name('contact_recipients.datatables');
        Route::resource('contact_recipients', 'ContactRecipientsController');

        Route::get('contact_messages/datatables',
            'ContactMessagesController@datatables')->name('contact_messages.datatables');
        Route::get('contact_messages/export', 'ContactMessagesController@export')->name('contact_messages.export');
        Route::resource('contact_messages', 'ContactMessagesController');

        Route::resource('faq_categories', 'FaqCategoriesController');

        Route::resource('faq_items', 'FaqItemsController');

        Route::resource('gestion_forums', 'GestionForumsController');
        Route::resource('post_forums', 'PostForumsController');
        Route::resource('category_forums', 'CategoryForumsController');

        Route::get('languages/datatables',
            'LanguagesController@datatables')->name('languages.datatables');
        Route::resource('languages', 'LanguagesController');

        Route::get('menu_banners/datatables',
            'MenuBannersController@datatables')->name('menu_banners.datatables');
        Route::resource('menu_banners', 'MenuBannersController');

        Route::get('modules/datatables',
            'ModulesController@datatables')->name('modules.datatables');
        Route::resource('modules', 'ModulesController')->except(['show']); // 'create', 'store',

        Route::get('newsletter_subscriptions/datatables',
            'NewsletterSubscriptionsController@datatables')->name('newsletter_subscriptions.datatables');
        Route::resource('newsletter_subscriptions', 'NewsletterSubscriptionsController')
            ->except(['create', 'edit', 'update', 'show']);

        /*Route::get('action_logs/datatables',
            'ActionLogsController@datatables')->name('action_logs.datatables');
        Route::resource('action_logs', 'ActionLogsController');*/

        Route::get('notifications/{id}',
            'NotificationsController@show')->name('notifications.show');
        Route::get('notifications', 'NotificationsController@index')->name('notifications.index');

        Route::get('pages/datatables', 'PagesController@datatables')->name('pages.datatables');
        Route::get('pages/edit-by-menu-id/{menu_id}', 'PagesController@editByMenuId')->name('pages.editByMenuId');
        Route::resource('pages', 'PagesController')->except(['create', 'store']);

        Route::get('parameter_groups/datatables',
            'ParameterGroupsController@datatables')->name('parameter_groups.datatables');
        Route::resource('parameter_groups', 'ParameterGroupsController');

        Route::get('parameters/datatables',
            'ParametersController@datatables')->name('parameters.datatables');
        Route::post('parameters/update-key-value-pairs',
            'ParametersController@updateKeyValuePairs')->name('parameters.update-key-value-pairs');
        Route::resource('parameters', 'ParametersController');

        Route::get('countries/datatables',
            'CountriesController@datatables')->name('countries.datatables');
        Route::resource('countries', 'CountriesController');

        /*Route::get('prodcut_categories/datatables',
            'ProductCategoriesController@datatables')->name('prodcut_categories.datatables');
        Route::resource('prodcut_categories', 'ProductCategoriesController');

        Route::get('product_brands/datatables',
            'ProductBrandsController@datatables')->name('product_brands.datatables');
        Route::resource('product_brands', 'ProductBrandsController');

        Route::get('products/datatables',
            'ProductsController@datatables')->name('products.datatables');
        Route::resource('products', 'ProductsController');

        Route::get('appointment_recipient/datatables',
            'AppointmentRecipientsController@datatables')->name('appointment_recipient.datatables');
        Route::resource('appointment_recipient', 'AppointmentRecipientsController');

        Route::get('appointments/datatables',
            'AppointmentsController@datatables')->name('appointments.datatables');
        Route::resource('appointments', 'AppointmentsController');*/

        Route::get('posts/datatables', 'PostsController@datatables')->name('posts.datatables');
        Route::resource('posts', 'PostsController');

        Route::resource('events', 'EventsController');

        Route::resource('event_categories', 'EventCategoriesController');
        Route::get('aspims/datatables', 'AspimsController@datatables')->name('aspims.datatables');
        Route::get('aspim_categories/datatables', 'AspimCategoriesController@datatables')->name('aspim_categories.datatables');
        Route::resource('aspims', 'AspimsController');

        // Gestionnaire des aspims
        Route::get('gestionnaire_aspim/datatables', 'GestionnaireAspimsController@datatables')->name('gestionnaire_aspim.datatables');
        Route::resource('gestionnaire_aspim', 'GestionnaireAspimsController');


        Route::resource('aspim_categories', 'AspimCategoriesController');

        Route::resource('media_album_categories', 'MediaAlbumCategoriesController');

        Route::resource('media_albums', 'MediaAlbumsController');

        Route::resource('media_files', 'MediaFilesController');

        Route::resource('trainings', 'TrainingsController');

        Route::resource('training_categories', 'TrainingCategoriesController');

        Route::resource('news', 'NewsController');

        Route::resource('news_categories', 'NewsCategoriesController');

        Route::resource('useful_link_categories', 'UsefulLinkCategoriesController');

        Route::resource('useful_links', 'UsefulLinksController');

        Route::get('app_texts/datatables', 'AppTextsController@datatables')->name('app_texts.datatables');
        Route::resource('app_texts', 'AppTextsController')->except(['show']);

        /*
        Route::get('app-texts/init-translation-from-file',
            'AppTextsController@initTranslationFromFile')->name('app_texts.init_from_file');
        Route::get('app-texts/publish-translation-to-file',
            'AppTextsController@publishTranslationToFile')->name('app_texts.publish_to_file');
        */

        Route::get('countries/datatables',
            'CountriesController@datatables')->name('countries.datatables');
        Route::resource('countries', 'CountriesController');

        Route::get('governorates/datatables',
            'GovernoratesController@datatables')->name('governorates.datatables');
        Route::resource('governorates', 'GovernoratesController');

        Route::get('cities/datatables', 'CitiesController@datatables')->name('cities.datatables');
        Route::resource('cities', 'CitiesController');

        Route::get('zones/datatables', 'ZonesController@datatables')->name('zones.datatables');
        Route::resource('zones', 'ZonesController');

        Route::resource('partners', 'PartnersController');

        Route::resource('partner_categories', 'PartnerCategoriesController');

        Route::resource('testimonials', 'TestimonialsController');

        Route::resource('sitemaps', 'SitemapsController');

        Route::resource('testimonial_categories', 'TestimonialCategoriesController');

        Route::resource('files', 'FilesController');

        Route::resource('schemas', 'SchemasController');

        Route::resource('file_categories', 'FileCategoriesController');

        Route::resource('programs', 'ProgramsController');

        Route::resource('map_layers', 'MapLayersController');

        Route::resource('outil_gestions', 'OutilGestionsController');

        Route::resource('outil_gestion_categories', 'OutilGestionCategoriesController');

        Route::resource('procedures', 'ProceduresController');

        Route::resource('procedure_categories', 'ProcedureCategoriesController');
        Route::resource('plans', 'PlansController');

        Route::resource('plan_categories', 'PlanCategoriesController');

        Route::resource('widgets', 'WidgetsController');
        Route::get('update-widget-elements-collection',
            'WidgetElementsController@updateCollection')->name('widget_elements.update_collection');
        Route::post('update-widget-elements-order',
            'WidgetElementsController@updateOrder')->name('widget_elements.update_order');
        Route::post('module-orderable-columns',
            'WidgetElementsController@moduleOrderableColumns')->name('widget_elements.module_orderable_columns');
        Route::get('update-widget-menus-collection',
            'WidgetMenusController@updateCollection')->name('widget_menus.update_collection');

        Route::get('/test/mail/{to}', 'TestController@mail');

        Route::get('download-database', function () {
            Spatie\DbDumper\Databases\MySql::create()
                /*->setDumpBinaryPath('C:/xampp_7_2/mysql/bin')*/
                ->setDbName(env('DB_DATABASE'))
                ->setUserName(env('DB_USERNAME'))
                ->setPassword(env('DB_PASSWORD'))
                ->dumpToFile('dump.sql');

            $file = public_path('dump.sql');
            if (file_exists($file)) {
                return response()->download($file, 'dump.sql')->deleteFileAfterSend(true);
            } else {
                echo 'Fichier n\'existe pas';
            }
        });
    });

// Out of the group(['middleware' => 'check.permission'])

    Route::post('menus/get_form_by_link_type_id',
        'MenusController@getFormByLinkTypeId')->name('menus.get_form_by_link_type_id');

    Route::post('banners/get_form_by_link_type_id',
        'BannersController@getFormByLinkTypeId')->name('banners.get_form_by_link_type_id');

});
