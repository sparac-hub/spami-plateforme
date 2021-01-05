
## Todo List
 - translate current url to other locales
 - php artisan cms:install => should be disabled in production
 - back/admin_1 => should be deleted in production
 - {{ html()->button('create')->route($name, $parameters = [], $absolute = true) }}
 - Translation migration: if(softedeletes) => unique(['locale', 'element_id', 'deleted_at'], 'name_foreign_key')
 - Slug : show notice max length 75 or 100 characters
 - balck listed slugs: fr, en, ar, es, de, ch
 - Add UpdaterTrait to model that we want to track who made actions (create, update, delete)
 - Generate translation files whenever we update database translations table
 - Add new locale via backoffice [to discuss? Clone an existing language? make empty rows on all tables for the new locale?]
 - Sitemaps.xml generation
 - Module generator
 - Add interactive map to parameters (map_lng, map_lat)
 - Add analytics info to parameters
 - Table pages => foreign key menu_id
 - Check all forign keys on the database
 - Delete cascade


## Todo : Check These:
 - Migrations:
    - order : ->default(0)
    - is_active : ->default(0
    - created_by, updated_by and deleted_by (Use trait updater in model)

 - Models:
    - Clean this : use \Dimsav\Translatable\Translatable; => Call this trait same way as we call UpdaterTrait
