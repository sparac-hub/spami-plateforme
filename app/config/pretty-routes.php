<?php

return [

    /**
     * The endpoint to access the routes.
     */
    'url' => 'fr/admin/routes',

    /**
     * The middleware(s) to apply before attempting to access routes page.
     */
    'middlewares' => ['web', 'auth', 'role:Admin'],

    /**
     * Indicates whether to enable pretty routes only when debug is enabled (APP_DEBUG).
     */
    'debug_only' => true,

    /**
     * The methods to hide.
     */
    'hide_methods' => [
        'HEAD',
    ],

    /**
     * The routes to hide with regular expression
     */
    'hide_matching' => [
        '#^_debugbar#',
        '#^routes$#',
        // Custom config for the CMS
        '#^log-viewer#',
        '#^lfm#',
        '#^test#',
        '#^(ar|fr|en)\/test\/#'
    ],

];
