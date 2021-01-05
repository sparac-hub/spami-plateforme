<?php

Route::get('module-generator', function () {

    /*if ( ! defined('DS')) {
        define('DS', DIRECTORY_SEPARATOR);
    }*/

    $moduleName = 'ProcedureModule';
    $moduleName = 'AspimModule';

    // This may have some issues, it would be better to generate one model for every iteration

    $originalNewPairs = [
        'FileCategory' => 'ProcedureCategory',
        'FileCategoryTranslation' => 'ProcedureCategoryTranslation',
        'File' => 'Procedure',
        'FileTranslation' => 'ProcedureTranslation',
        'EventCategory' => 'AspimCategory',
        'EventCategoryTranslation' => 'AspimCategoryTranslation',
        'Event' => 'Aspim',
        'EventTranslation' => 'AspimTranslation',
    ];


    $availableModuleMigrations = [
        'User' => '2014_10_12_000000_create_users_table.php',
        'PostCategory' => '2018_02_19_080935_create_post_categories_table.php',
        'Banner' => '2018_02_19_081820_create_banners_table.php',
        'ContactRecipient' => '2018_02_19_082228_create_contact_recipients_table.php',
        'QuotationRecipient' => '2018_02_19_082608_create_quotation_recipients_table.php',
        'Quotation' => '2018_02_19_082635_create_quotations_table.php',
        'DocumentCategory' => '2018_02_19_082728_create_document_categories_table.php',
        'FaqCategory' => '2018_02_19_083647_create_faq_categories_table.php',
        'FaqItem' => '2018_02_19_084251_create_faq_items_table.php',
        'Gallery' => '2018_02_19_084937_create_galleries_table.php',
        'GalleryImage' => '2018_02_19_085452_create_gallery_images_table.php',
        'Language' => '2018_02_19_085904_create_languages_table.php',
        'NewsletterSubscription' => '2018_02_19_093453_create_newsletter_subscriptions_table.php',
        'Page' => '2018_02_19_094136_create_pages_table.php',
        'ParameterGroup' => '2018_02_19_094300_create_parameter_groups_table.php',
        'Parameter' => '2018_02_19_094334_create_parameters_table.php',
        'Country' => '2018_02_19_094451_create_countries_table.php',
        'Governorate' => '2018_02_19_094612_create_governorates_table.php',
        'ContactMessage' => '2018_02_19_094757_create_contact_messages_table.php',
        'ProductCategory' => '2018_02_19_094855_create_product_categories_table.php',
        'ProductBrand' => '2018_02_19_095019_create_product_brands_table.php',
        'Product' => '2018_02_19_095501_create_products_table.php',
        'AppointmentRecipient' => '2018_02_19_095639_create_appointment_recipients_table.php',
        'Appointment' => '2018_02_19_095701_create_appointments_table.php',
        'Post' => '2018_02_19_100141_create_posts_table.php',
        'Document' => '2018_02_19_100449_create_documents_table.php',
        'Locale' => '2018_03_02_085348_create_locales_table.php',
        'UsefulLinkCategory' => '2018_06_27_075021_create_useful_link_categories_table.php',
        'EventCategory' => '2018_07_04_073821_create_event_categories_table.php',
        'FileCategory' => '2018_07_04_073821_create_file_categories_table.php',
        'UsefulLink' => '2018_07_05_083311_create_useful_links_table.php',
        'Event' => '2018_07_05_102033_create_events_table.php',
        'File' => '2018_07_05_102033_create_files_table.php',
        'City' => '2018_09_07_082637_create_cities_table.php',
        'Zone' => '2018_09_07_083748_create_zones_table.php',
        'LanguageLine' => '2018_12_04_082510_create_language_lines_table.php',
        'PartnerCategory' => '2019_01_22_075021_create_partner_categories_table.php',
        'Partner' => '2019_01_22_083311_create_partners_table.php',
        'NewsCategory' => '2018_07_04_073821_create_news_categories_table.php',
        'News' => '2018_07_04_102033_create_news_table.php',
    ];


    /*
    $migrationFiles = scandir(base_path('database' . DS . 'migrations' . DS . 'cms'));

    foreach ($migrationFiles as $migrationFile):
        echo "<br>'' => '".$migrationFile."',";
    endforeach;

    'User' => '2014_10_12_000000_create_users_table.php',
    'PostCategory' => '2018_02_19_080935_create_post_categories_table.php',
    'Banner' => '2018_02_19_081820_create_banners_table.php',
    'ContactRecipient' => '2018_02_19_082228_create_contact_recipients_table.php',
    'QuotationRecipient' => '2018_02_19_082608_create_quotation_recipients_table.php',
    'Quotation' => '2018_02_19_082635_create_quotations_table.php',
    'DocumentCategory' => '2018_02_19_082728_create_document_categories_table.php',
    'FaqCategory' => '2018_02_19_083647_create_faq_categories_table.php',
    'FaqItem' => '2018_02_19_084251_create_faq_items_table.php',
    'Gallery' => '2018_02_19_084937_create_galleries_table.php',
    'GalleryImage' => '2018_02_19_085452_create_gallery_images_table.php',
    'Language' => '2018_02_19_085904_create_languages_table.php',
    'NewsletterSubscription' => '2018_02_19_093453_create_newsletter_subscriptions_table.php',
    'Page' => '2018_02_19_094136_create_pages_table.php',
    'ParameterGroup' => '2018_02_19_094300_create_parameter_groups_table.php',
    'Parameter' => '2018_02_19_094334_create_parameters_table.php',
    'Country' => '2018_02_19_094451_create_countries_table.php',
    'Governorate' => '2018_02_19_094612_create_governorates_table.php',
    'ContactMessage' => '2018_02_19_094757_create_contact_messages_table.php',
    'ProductCategory' => '2018_02_19_094855_create_product_categories_table.php',
    'ProductBrand' => '2018_02_19_095019_create_product_brands_table.php',
    'Product' => '2018_02_19_095501_create_products_table.php',
    'AppointmentRecipient' => '2018_02_19_095639_create_appointment_recipients_table.php',
    'Appointment' => '2018_02_19_095701_create_appointments_table.php',
    'Post' => '2018_02_19_100141_create_posts_table.php',
    'Document' => '2018_02_19_100449_create_documents_table.php',
    'Locale' => '2018_03_02_085348_create_locales_table.php',
    'UsefulLinkCategory' => '2018_06_27_075021_create_useful_link_categories_table.php',
    'EventCategory' => '2018_07_04_073821_create_event_categories_table.php',
    'FileCategory' => '2018_07_04_073821_create_file_categories_table.php',
    'UsefulLink' => '2018_07_05_083311_create_useful_links_table.php',
    'Event' => '2018_07_05_102033_create_events_table.php',
    'File' => '2018_07_05_102033_create_files_table.php',
    'City' => '2018_09_07_082637_create_cities_table.php',
    'Zone' => '2018_09_07_083748_create_zones_table.php',
    'LanguageLine' => '2018_12_04_082510_create_language_lines_table.php',
    'PartnerCategory' => '2019_01_22_075021_create_partner_categories_table.php',
    'Partner' => '2019_01_22_083311_create_partners_table.php',
    //'Password' => '2014_10_12_100000_create_password_resets_table.php',
    //'Notification' => '2018_01_08_232147_create_notifications_table.php',
    //'' => '2018_02_13_080300_create_modules_table.php',
    //'' => '2018_02_13_103757_create_permission_tables.php',
    //'' => '2018_02_13_103857_add_module_id_column_to_permissions_table.php',
    //'' => '2018_02_19_080327_create_menus_table.php',
    //'MenuBanner' => '2018_02_19_090009_create_menu_banners_table.php',
    //'Keyword' => '2018_02_19_092646_create_keywords_table.php',
    //'MenuGroup' => '2018_02_21_145519_create_menu_groups_table.php',
    //'LinkType' => '2018_03_01_110732_create_link_types_table.php',
    //'' => '2018_03_12_143337_create_permission_route_name_table.php',
    //'' => '2018_03_23_132624_create_activity_log_table.php',
    //'' => '2018_03_27_140950_create_home_sections_table.php',

    */


    foreach ($originalNewPairs as $originalModel => $newModel):


        $moduleFiles = [
            'app' . DS . 'Http' . DS . 'Controllers' . DS . 'Back' . DS . Str::plural($originalModel) . 'Controller.php',
            'app' . DS . 'Http' . DS . 'Controllers' . DS . 'Front' . DS . Str::plural($originalModel) . 'Controller.php',
            'app' . DS . 'Http' . DS . 'Requests' . DS . $originalModel . 'Request.php',
            'app' . DS . 'Http' . DS . 'Requests' . DS . 'Store' . $originalModel . '.php',
            'app' . DS . 'Http' . DS . 'Requests' . DS . 'Update' . $originalModel . '.php',
            'app' . DS . 'Models' . DS . 'Cms' . DS . $originalModel . '.php',
            'app' . DS . 'Models' . DS . 'Cms' . DS . $originalModel . 'Translation.php',
            'database' . DS . 'factories' . DS . 'cms' . DS . $originalModel . 'Factory.php',
            isset($availableModuleMigrations[$originalModel]) ? 'database' . DS . 'migrations' . DS . 'cms' . DS . $availableModuleMigrations[$originalModel] : null,
            'database' . DS . 'seeds' . DS . 'cms' . DS . Str::plural($originalModel) . 'TableSeeder.php',
            //'resources' . DS . 'lang' . DS . 'en' . DS . 'og.php',
            'resources' . DS . 'views' . DS . 'back' . DS . Str::snake(Str::plural($originalModel)) . DS . 'create.blade.php',
            'resources' . DS . 'views' . DS . 'back' . DS . Str::snake(Str::plural($originalModel)) . DS . 'edit.blade.php',
            'resources' . DS . 'views' . DS . 'back' . DS . Str::snake(Str::plural($originalModel)) . DS . 'index.blade.php',
            'resources' . DS . 'views' . DS . 'back' . DS . Str::snake(Str::plural($originalModel)) . DS . 'show.blade.php',
            'resources' . DS . 'views' . DS . 'front' . DS . Str::snake(Str::plural($originalModel)) . DS . 'create.blade.php',
            'resources' . DS . 'views' . DS . 'front' . DS . Str::snake(Str::plural($originalModel)) . DS . 'edit.blade.php',
            'resources' . DS . 'views' . DS . 'front' . DS . Str::snake(Str::plural($originalModel)) . DS . 'index.blade.php',
            'resources' . DS . 'views' . DS . 'front' . DS . Str::snake(Str::plural($originalModel)) . DS . 'show.blade.php',
            'resources' . DS . 'views' . DS . 'front' . DS . Str::snake(Str::plural($originalModel)) . DS . 'category.blade.php',
            //'resources' . DS . 'views' . DS . 'front',
            //'routes' . DS . 'front.php',
            //'routes' . DS . 'back.php',
        ];

        foreach ($moduleFiles as $moduleFile):

            $newFile = storage_path('app' . DS . 'modules' . DS . $moduleName . DS . $moduleFile);

            $isAViewFile = Str::endsWith($newFile, '.blade.php');
            if ($isAViewFile) {
                $newFilePathArray = explode(DS, $newFile);

                $viewFileName = array_pop($newFilePathArray);
                array_pop($newFilePathArray);
                $newFile = implode(DS, $newFilePathArray);
                $newFile .= DS . Str::snake(Str::plural($newModel)) . DS . $viewFileName;
            }

            $path = explode(DS, $newFile);
            array_pop($path);
            $path = implode(DS, $path);

            if (is_string($path) && strlen($path) > 3 && !is_dir($path)) {
                // Create the full path in storage (directories)
                mkdir($path, 777, true);
            }

            // 'app' . DS . 'Http' . DS . 'Controllers' . DS . 'Back' . DS . Str::plural($originalModel) . 'Controller.php'
            // The current file (to be generated)
            $originalFile = base_path($moduleFile);

            /*
             dump([
                'COPY FROM->TO',
                $originalFile,
                $newFile,
            ]);
            */

            // Model FileName
            $newFile = Str::replaceLast(
                $originalModel . '.php',
                $newModel . '.php',
                $newFile
            );
            $newFile = Str::replaceLast(
                $originalModel . 'Translation.php',
                $newModel . 'Translation.php',
                $newFile
            );

            /*dump([
                $originalFile,
                Str::contains($originalFile, 'app' . DS . 'Models' . DS . 'Cms' )
            ]);*/

            // Factory FileName
            $newFile = Str::replaceLast(
                $originalModel . 'Factory.php',
                $newModel . 'Factory.php',
                $newFile
            );

            // Requests FileName
            $newFile = Str::replaceLast(
                $originalModel . 'Request.php',
                $newModel . 'Request.php',
                $newFile
            );

            // Plural Controller
            $newFile = Str::replaceLast(
                Str::plural($originalModel) . 'Controller.php',
                Str::plural($newModel) . 'Controller.php',
                $newFile
            );

            /*$isAViewFile = str_finish('.blade.php', $newFile);
            if ($isAViewFile) {
                // Replace the directory name :
                $newFile = Str::replaceLast(
                    Str::snake(lcfirst(Str::plural($originalModel))),
                    Str::snake(lcfirst(Str::plural($newModel))),
                    $newFile
                );
            }*/

            // Removes Double 's' in Controller Files
            // Example: NewssController => NewsController
            $newFile = Str::replaceLast(
                'ssController.php',
                'sController.php',
                $newFile
            );

            if (file_exists($originalFile) && is_file($originalFile)) {

                copy($originalFile, $newFile);
                /*
                dump([
                    $originalFile,
                    $newFile,
                ]);
                */
                $newFileContent = File::get($newFile);

                // Update File Content
                $newFileContent = str_replace(
                    Str::plural($originalModel),
                    Str::plural($newModel),
                    $newFileContent
                );

                // my_model_id
                $newFileContent = str_replace(
                    Str::snake(lcfirst($originalModel)) . '_id',
                    Str::snake(lcfirst($newModel)) . '_id',
                    $newFileContent
                );

                // my_model_translations
                $newFileContent = str_replace(
                    Str::snake(lcfirst($originalModel)) . '_translations',
                    Str::snake(lcfirst($newModel)) . '_translations',
                    $newFileContent
                );

                // my_models
                /*$newFileContent = str_replace(strtolower(Str::plural(lcfirst($originalModel))),
                    strtolower(Strgit::plural(lcfirst($newModel))),
                    $newFileContent);*/

                // // my_models
                $newFileContent = str_replace(
                    Str::snake(lcfirst(Str::plural($originalModel))),
                    Str::snake(lcfirst(Str::plural($newModel))),
                    $newFileContent
                );

                // MyModel
                $newFileContent = str_replace(
                    $originalModel,
                    $newModel,
                    $newFileContent
                );

                //my_model
                $newFileContent = str_replace(
                    Str::snake(lcfirst($originalModel)),
                    Str::snake(lcfirst($newModel)),
                    $newFileContent
                );

                // Fixing issuse like: preventDefault 'event'

                $from_to = [
                    'pr' . strtolower($newModel) . 'Default' => 'pre' . strtolower($originalModel) . 'Default',
                    'training_training' => 'training',
                    'function ' . Str::snake(lcfirst($originalModel)) . '()' => 'function ' . Str::snake(lcfirst($newModel)) . '()',
                    $originalModel . '::class' => $newModel . '::class',
                ];

                // Todo : replace in TrainingCtageoryTranslation => public function training_category() and training_category_id
                // => where filename ends with 'Training.php'


                foreach ($from_to as $from => $to) {
                    $newFileContent = str_replace(
                        $from,
                        $to,
                        $newFileContent
                    );
                }


                // $oldModel is already changed in previous action
                $newFileContent = str_replace(
                    Str::plural($newModel) . '::',
                    $newModel . '::',
                    $newFileContent
                );

                $newFileContent = str_replace(
                    Str::plural($newModel) . ' extends BaseModel',
                    $newModel . ' extends BaseModel',
                    $newFileContent
                );

                $newFileContent = str_replace(
                    Str::plural($newModel) . ' extends Model',
                    $newModel . ' extends Model',
                    $newFileContent
                );

                file_put_contents($newFile, $newFileContent);

                echo '<br><span style="color: darkgreen">' . str_replace(base_path(), '', $newFile) . '</span>';
            } else {
                echo('<br><span style="color: darkred">' . str_replace(base_path(), '',
                        $originalFile) . ' : FILE NOT FOUND </span>');
            }

        endforeach;

        echo '<br>Reste :';
        echo "<br>* Routes";
        echo "<br>* Translations";
        echo "<br>* ModulesTableSeeder";
        echo "<br>* Breadcrumbs (lang/routes)";

    endforeach; //foreach ($originalNewPairs as $originalModel => $newModel):

});

Route::get('finder', function () {

    $finder = new Symfony\Component\Finder\Finder();
    $finder->files()->in(base_path('vendor' . DS . 'laravel'))->contains('Finder');

    foreach ($finder as $file) {
        // dumps the absolute path
        //var_dump($file->getRealPath());

        // dumps the relative path to the file, omitting the filename
        //var_dump($file->getRelativePath());

        // dumps the relative path to the file
        dump($file->getRelativePathname());
    }
});
