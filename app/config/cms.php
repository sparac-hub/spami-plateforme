<?php

return [

    'front_views_folder' => 'front',
    'backend' => [
        'prefix' => env('BACKEND_PREFIX', 'admin'),
    ],
    'auth' => [
        'login' => env('LOGIN_PREFIX', 'login'),
        'prefix' => NULL,
        'views_folder' => NULL,
    ],

    'sql' => [
        'like' => 'like', // In postgres we use 'ilike', In Mysql 'like'
    ],

    'locale_prefix' => '',

    'google' => [
        'recaptcha' => [
            'key' => env('GOOGLE_RECAPTCHA_KEY'),
            'secret' => env('GOOGLE_RECAPTCHA_SECRET'),
        ]
    ],

    /**
     * All Urls should be prefixed with a locale
     * Redirect : [cms-laravel.test] to [cms-laravel.test/fr]
     */
    'redirect_default_locale' => env('REDIRECT_DEFAULT_LOCALE', true),


    'role_dashboard' => [
        //'User' => 'custom_app.dashboard.index',
    ],

    /**
     *
     * IMPORTANT :
     *
     *  These data must be the same as the data in :
     *  'menu_groups' table in the data base
     *  Data are filled via : MenuGroupsTableSeeder !
     *
     */

    'menu_groups' => [
        1 => 'Main menu', // Keep this (id=1) as the main menu ! (Used For Seeding DB with the homepage menu item)
        2 => 'Secondary menu',
        3 => 'Footer menu',
        4 => 'Other menu',
        5 => 'Left menu',
        6 => 'Right menu',
        7 => 'Social menu',
    ],

    // Todo : These data must be set in the database (Then in cache)
    'link_types' => [
        1 => 'Module',
        2 => 'Lien interne',
        3 => 'Lien externe',
        4 => 'Menu',
    ],
    'link_types_banner' => [
        1 => 'Menu',
        2 => 'Lien interne',
        3 => 'Lien externe',
    ],

    /**
     *
     *  Important ! *********************************************************** !
     *  These values are set in the 'menus' tables as enum('http://', 'https://')
     *
     */
    'http_protocols' => [
        'http://',
        'https://',
    ],

    /**
     *
     *  Important ! ******************************************************* !
     *  These values are set in the 'menus' tables as enum('_self', '_blank')
     *
     */
    'link_targets' => [
        '_self' => 'Même fenêtre',
        '_blank' => 'Dans une nouvelle fenêtre',
    ],

    'cache_lifetime' => [
        'menus' => 15 * 60,
        'partners' => 1440 * 60,
        'parameters' => 60 * 60,
        'active_locales' => 60 * 60,
        'default_locale' => 60 * 60,
        'parameter_group' => 60 * 60,
        'dashboard_modules' => 1440 * 60,
        'permission_name_for_route_name' => 1440 * 60,
    ],

    'front_pagination' => [
        'news' => 10,
        'events' => 10,
        'faqs' => 10,
        'trainings' => 10,
        'useful-links' => 10,
        'files' => 10,
        'media' => 10,
        'testimonials' => 10,
        'partners' => 10,
        'aspims' => 16,
        'procedures' => 10,
        'gestionnaire' => 8,
    ],

    'layersOws' => [
        'display' => false,
        'items' => [
            'mapamed_ebsas_wgs84' => 'Ecologically or Biologically Significant Marine Areas (EBSAs)',
            'mapamed_biosphere_reserves_wgs84' => 'Biosphere Reserve UNESCO',
            'mapamed_world_heritage_sites_wgs84' => 'World Heritage Site',
            //        'medbiodivsdi:Medkeyhabitats_coralligenous' => 'Cetacean Critical Habitats',
            'mapamed_spamis_wgs84' => 'Specially Protected Areas of Mediterranean Importance (SPAMIs)',
            'mapamed_natura_2000_wgs84' => 'NATURA2000 marine sites',
            'mapamed_national_mpas_wgs84' => 'National MPAs',
            'mapamed_national_mpas_wgs84' => 'PMIBB',
            'mapamed_national_mpas_wgs84' => 'Particularly Sensitive Sea Areas (PSSAs)',
            'mapamed_fras_wgs84' => 'Fisheries Restricted Areas (FRAs)',
            'mapamed_ramsar_sites_wgs84' => 'Ramsar',
        ],
    ],
];
