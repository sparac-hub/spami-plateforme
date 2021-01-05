# CMS Laravel 1.0

Laravel framework version: 5.8

# Installation

 * Execute command: composer install
 * Create an empty database
 * Copy .env.example to .env
 * Set up database config in: /.env
 * Execute command: php artisan key:generate
 * Execute command: php artisan cms:install
      * PS: If you want to fill tables with fake data, you got to set: **APP_ENV=local** inside /.env
  * Execute command: php artisan storage:link
 * Download back-office template from http://192.168.20.201/medianet_interne/template-backend-cms and copy public/back/assets and public/back/assets_libs to public/back
 * Run all Mix tasks and minify output (check file webpack.mix.js):
     * npm run production

# Forum Installation:
Notice: the forum is already installed in this project
If the forum is already installed
 * Execute command: php artisan db:seed --class=ChatterTableSeeder

Else
This is the installation Link 

Please Include the [1.1.0](https://github.com/medianet-dev/forum/tree/1.1.0) version


# Modules List:

* **Menus**
* **Pages**
* **Contact**
* **Banners**
* **Document**
* **Parameters**
* **Products**
* **Quotations**
* **Events**
* **Useful Links**
* **Notifications**
* **ACL**
* **Dev: Log**
* **Dev: Route List**
* **Dev: Cache Cleaner**
* **Dev: Query Detector**
* **Dev: OrangeHill/iseed**


# Tips and tricks:
  * To change the SMTP configuration: BO: Settings -> SMTP
  * To change the admin or login prefix: .env BACKEND_PREFIX/LOGIN_PREFIX
  * Template: www.cms-laravel.test/back/admin_1/
  * Debugging:
      * Functions for debugging:
          * dd($var)
          * dump($var)
          * pp($var)
      * Enable debugbar: open file ".env" and set: DEBUGBAR_ENABLED=true
      * Log viewer: www.cms-laravel.test/log-viewer
      * Log files: storage/logs
      * Writing log messages: https://laravel.com/docs/5.6/logging#writing-log-messages
  * Folder strucutre (Most used folders/files)
```
[cms-laravel-project]
└─── app
│     └─── Helpers
│     └─── Http
│     │     └─── Controllers
│     │     └─── Middleware
│     │     └─── Requests
│     └─── Notifications
│     └─── Observers
│     └─── Policies
│     └─── Providers
│     └─── Services
│     └─── Traits
└───config
└───database
│     └─── factories
│     └─── migrations
│     └─── seeds
└───public
└───resources
└───routes
└───storage
│     └─── framework
│     │    └─── cache
│     │          └─── data
│     └─── logs
│ .env
│ composer.json
```


# Used packages (production):
 * "dimsav/laravel-translatable"
 * "unisharp/laravel-filemanager"
 * "spatie/laravel-permission"
 * "yajra/laravel-datatables-oracle"
 * "spatie/laravel-medialibrary"
 * "arcanedev/log-viewer"
 * "spatie/laravel-activitylog"
 * "garygreen/pretty-routes"
 * "spatie/laravel-backup"
 * "spatie/laravel-translation-loader"

# Used packages (dev):
 * "beyondcode/laravel-query-detector"
 * "beyondcode/laravel-dump-server"
 * "barryvdh/laravel-debugbar" * "arcanedev/log-viewer"
 * "spatie/laravel-activitylog"
 * "garygreen/pretty-routes"
 * "barryvdh/laravel-ide-helper"

# Coding conventions:

* **Model:**
    * class name: PostCategory (Singular)
    * primary key column name: id
    * foreign key column name: other_model_id (example: post_category_id, user_id)
    * method name: getSomethingByid()

* **Controller:**
    * class name: PostCategoriesController (Plural)
    * method name: getSomethingByid()

* **Variables:**
    * singular: $post_category
    * plural  : $post_categories


* **Views:**
    * folder name: post_categories (plural)
    * index     : index.blade.php
    * create    : create.blade.php
    * edit      : edit.blade.php
    * show      : show.blade.php

* **Routes:**
    * index  : post_categories.index
    * create : post_categories.create
    * store  : post_categories.store
    * edit   : post_categories.edit
    * update : post_categories.update
    * show   : post_categories.show
    * destroy: post_categories.destroy

* **Helpers:**
    * path       : app/Helpers/
    * method name: get_something_done($param) { /* Do something */ }

* **Notifications:**
    * path: app/Notifications/
    * name: SomethingDone (InvoicePaid, UserLoggedOut, PizzaDelivered..)

* **Database:**
    * Seeder:
        * name: PostCategoriesTableSeeder (SomethingPluralTableSeeder)

    * Migration:
        * table names        : plural (Examples: users, posts, articles, products...)
        * name (create table): create_post_categories_table.php (create_[plural:table_name]_table.php)
        * name (add column)  : add_column_example1_to_post_categories_table.php (add_column_[column_name]_to_[table_name]_table.php)
        * table structure: In general, every table must have:
            * $table->increments('id');  // The default primary key
            * $table->timestamps();  // Columns : created_at and updated_at

* **Comments**
    * On blade files: Use {{-- This is a comment --}} instead of \<!-- Usual Html Comment -->
      * => This way the comment will not appear while inspecting source code on the browser.


# Cache Lifetime:
 * We can set a lifetime [minutes] for every element stored in cache:
    => config/misc.php [app/Helpers/CacheHelpers.php]
 * PS: we can clear cache manually via the backoffice: Dev Tools => Cache Cleaner > [Clear cache] [Clear Config] [Clear View]
 
 
 # Bound to the container
 * app()->redirectDefaultLocale : [AppServiceProvider@boot] this contains: config('cms.redirect_default_locale') true/false
 
 # Command to load translation files to the database
 * php artisan db:load-translations => This command uses **spatie/laravel-translation-loader** package behind-the-scenes to load translations to database


# Migration paths:
* We have three migration paths: [check: AppServiceProvider@setUpMigrationPaths]
    * [1] database/migrations/cms
    * [2] database/migrations/custom_app
    * [3] database/migrations



# -----
Controller, View, Model, View Composer, AppServiceProvider, Helper, Seeder, Factory, Facade, Namespace, Console command, Notification, Cache, Observer, Middleware, Eloquent Eager Loading [N + 1 query problem],


#------
* locale() : app()->getLocale()

# Move User Model to Models namespace
    https://github.com/driesvints/laravel/commit/9a79be2f8752ae5a7e6a1c5dfcbf8e5f1bf6752d
 * app/Http/Controllers/Auth/RegisterController.php
 * app/Models/User.php
 * config/auth.php
 * config/services.php
 * database/factories/UserFactory.php
 * routes/channels.php

# When creating new customApp:
 * Copy [resources/views/front] to [resources/views/custom_app/front]
 *

# Postgres issue with autoincrement!
    * The bad way:
    SELECT MAX(id) FROM countries;
    SELECT nextval('countries_id_seq');
    SELECT setval('countries_id_seq', (SELECT MAX(id) FROM countries)+1);
    SELECT setval('country_translations_id_seq', (SELECT MAX(id) FROM country_translations)+1);

    * The good way:
    Remove id values (autoincrement) from seeder
    => https://stackoverflow.com/questions/47547486/dbseed-laravel-5-5-x-not-increment-sequence-id-of-postgres


# Module structure

 app/Http/Controllers/Back/
 app/Http/Controllers/Front/
 app/Http/Requests
 app/Models/Cms/
 database/factories/cms/
 database/migrations/cms/
 database/seeds/cms
 resources/lang/en/og.php
 resources/views/back
 resources/views/front
 routes/front.php
 routes/back.php

# Important:
 * Cache TTL Change Coming to Laravel 5.8 (TTL: seconds instead of minutes)
   => https://laravel-news.com/cache-ttl-change-coming-to-laravel-5-8

