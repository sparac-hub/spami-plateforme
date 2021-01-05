<?php
/**
 *
 *
 * Dont execute TEST on Production : Some operations may change database records !
 *
 *
 */


if (env('APP_ENV') == 'local'):
    Route::group(['prefix' => 'test'], function () {

        Route::get('create-user', function () {
            $user = factory(App\Models\Cms\User::class)->create([
                'password' => bcrypt('secret'),
            ]);

            dump($user->toArray());
        });

        Route::get('banners-factory', function () {
            factory('App\Models\Cms\Banner', 12)->create();
        });

        Route::get('nplusone', function () {

            $faqs = App\Models\Cms\FaqCategory::/*with('faq_items')->*/
            get();

            foreach ($faqs as $f) {
                foreach ($f->faq_items as $i) {
                    echo $i->id;
                }
            }

        });

        Route::get('spatie/translation-loader', function () {


            $where = [
                'group' => 'cms',
                'key' => 'blog_post',
            ];

            $language_line = Spatie\TranslationLoader\LanguageLine::where($where)->first();

            if ($language_line) {
                //$request->text;
                $data = [
                    'en' => 'Thisqd field',
                    'nl' => 'bonobo',
                ];
                $language_line->update([
                    'text' => $data,
                ]);
            } else {
                Spatie\TranslationLoader\LanguageLine::create([
                    'group' => 'cms',
                    'key' => 'blog_post',
                    'text' => [

                    ],
                ]);
            }

            /*LanguageLine::create([
                'group' => 'cms',
                'key'   => 'blog_post',
                'text'  => [

                ],
            ]);*/

            app()->setLocale('nl');

            echo trans('cms.blog_post');

            /*LanguageLine::create([
                'group' => 'validation',
                'key' => 'required',
                'text' => [
                    'en' => 'This is a required field',
                    'nl' => 'Dit is een verplicht veld'
                ],
            ]);*/

        });

        Route::get('db-unprepared', function () {


            DB::unprepared(File::get(database_path('seeds/cms/sql/locations2.sql')));

            dd('Yo');

            $data = [

            ];

            foreach ($data as $d) {
                $country = App\Models\Cms\Country::create($d);
                foreach ($d['governorates'] as $governorate_data) {
                    $governorate_data['country_id'] = $country->id;
                    $governorate = App\Models\Cms\Governorate::create($governorate_data);
                    foreach ($governorate_data['cities'] as $city_data) {
                        $city_data['country_id'] = $country->id;
                        $city_data['governorate_id'] = $governorate->id;
                        $city = App\Models\Cms\City::create($city_data);
                        foreach ($city_data['zones'] as $zone_data) {
                            $zone_data['country_id'] = $country->id;
                            $zone_data['governorate_id'] = $governorate->id;
                            $zone_data['city_id'] = $city->id;
                            App\Models\Cms\Zone::create($zone_data);

                        }
                    }
                }
            }
            /**
             * TRUNCATE `cities`;
             * TRUNCATE `city_translations`;
             * TRUNCATE `countries`;
             * TRUNCATE `country_translations`;
             * TRUNCATE `governorates`;
             * TRUNCATE `governorate_translations`;
             * TRUNCATE `zones`;
             * TRUNCATE `zone_translations`;
             */
        });

        Route::get('make-location-seeder', function () {

            $countries = App\Models\Cms\Country::/*whereHas('country_translations', function($q){
            $q->where('name', 'TUNISIE');
        })->*/
            with([
                'governorates.governorate_translations',
                'governorates.cities.city_translations',
                'governorates.cities.zones.zone_translations',
            ])
                ->get();

            $locations_data = [];

            foreach ($countries as $country) {

                $current_country = [
                    'order' => $country->order,
                    'is_active' => $country->is_active,
                ];
                foreach ($country->translations as $country_translation) {
                    $current_country[$country_translation->locale]['name'] = $country_translation->name;
                    $current_country[$country_translation->locale]['nationality'] = $country_translation->nationality;
                }


                $current_governorates = [];
                foreach ($country->governorates as $governorate) {

                    $current_governorate = [
                        'order' => $governorate->order,
                        'is_active' => $governorate->is_active,
                    ];
                    foreach ($governorate->translations as $governorate_translation) {
                        $current_governorate[$governorate_translation->locale]['name'] = $governorate_translation->name;
                    }


                    $current_cities = [];
                    foreach ($governorate->cities as $city) {

                        $current_city = [
                            'order' => $city->order,
                            'is_active' => $city->is_active,
                        ];
                        foreach ($city->translations as $city_translation) {
                            $current_city[$city_translation->locale]['name'] = $city_translation->name;
                        }

                        $current_zones = [];
                        foreach ($city->zones as $zone) {

                            $current_zone = [
                                'order' => $zone->order,
                                'is_active' => $zone->is_active,
                                'postal_code' => $zone->postal_code,
                            ];
                            foreach ($zone->translations as $zone_translation) {
                                $current_zone[$zone_translation->locale]['name'] = $zone_translation->name;
                            }
                            $current_city['zones'][] = $current_zone;
                        }

                        $current_cities [] = $current_city;
                    }

                    $current_governorate['cities'] = $current_cities;
                    $current_governorates[] = $current_governorate;
                }

                $current_country['governorates'] = $current_governorates;
                $locations_data['countries'][] = $current_country;
            }

            // dd($locations_data);

            echo var_export54($locations_data);

        });

        Route::group(['prefix' => 'test'], function () {


            Route::get('active-pages', function () {
                $active_pages = App\Models\Cms\Page::active()->get();
                pp($active_pages->count());
            });

            Route::get('locales-cache', function () {

            });

            Route::get('galleries-factories', function () {
                factory('App\Models\Cms\Gallery', 4)->create()->each(function ($gallery) {
                    $gallery->images()->saveMany(factory('App\Models\Cms\GalleryImage', rand(3, 5))->make());
                });
            });

            Route::get('factories-rel', function () {
                /* App\Models\Cms\FaqItemTranslation::truncate();
                 App\Models\Cms\FaqItem::truncate();
                 App\Models\Cms\FaqCategoryTranslation::truncate();
                 App\Models\Cms\FaqCategory::truncate();*/
                factory('App\Models\Cms\FaqCategory', 7)->create()->each(function ($faq_category) {
                    $faq_category->faq_items()->saveMany(factory('App\Models\Cms\FaqItem', 9)->make());
                });
            });

            Route::get('fake-image', function () {
                $faker = Faker\Factory::create();
                $r = $faker->image(public_path('uploads\fake'));
                $file_path_array = explode('public\uploads\fake\\', $r);
                $fake_asset = 'fake\\' . $file_path_array[1];
                dd([$fake_asset, $r, $file_path_array]);
            });

            Route::get('set-app-params', function () {
                $parameters = [
                    ['reference' => 'email', 'value' => 'contact@medianet.test'],
                    ['reference' => 'facebook', 'value' => 'https://fb.com/cms.laravel.dev'],
                    ['reference' => 'youtube', 'value' => 'https://youtube.com/CmsLaravelDev'],
                    ['reference' => 'twitter', 'value' => 'https://twitter.com/@CmsLaravelDev'],
                    ['reference' => 'linkedin', 'value' => 'https://linkdin.com/in/CmsLaravelDev'],
                    ['reference' => 'google_plus', 'value' => 'https://plus.google.com/+CmsLaravelDev'],
                    ['reference' => 'vimeo', 'value' => 'https://vimeo.com/+CmsLaravelDev'],
                ];

                foreach ($parameters as $parameter) {
                    pp($parameter);
                    if ($p = App\Models\Cms\Parameter::where('reference', $parameter['reference'])->first()) {
                        $p->value = $parameter['value'];
                        $p->save();
                    }
                }
            });

            Route::get('save-array-to-file', function () {

                $array = [
                    'name' => 'foulen',
                    'address' => [
                        'street' => 'some street',
                        'city' => 'city name',
                        'governorate' => 'The governorate name',
                    ],
                ];

                // save serialized data in a text file
                $str = "<?php \n return " . var_export54($array, true);
                file_put_contents('my_array_file.txt', $str);

            });

            Route::get('roles_permissions', function () {

                /**
                 * $role = App\Models\Cms\Role::first();
                 * $permission = App\Models\Cms\Permission::firstOrCreate(['name' => 'List Parameters']);
                 *
                 * if(!$role->hasPermissionTo($permission)) {
                 * $role->givePermissionTo($permission);
                 * }
                 *
                 * /**/

                $user = App\Models\Cms\User::with('roles.permissions')->first();

                $r = App\Models\Cms\Role::with('permissions')->get();

                pp([
                    $user->hasPermissionTo('List Parameters'),
                    $user->toArray(),
                    $r->first()->hasPermissionTo('List Parameters'),
                    $r->toArray(),
                ]);
            });


            Route::get('permissions_route_names', function () {

                $role = App\Models\Cms\Role::first();
                $permission = App\Models\Cms\Permission::firstOrCreate(['name' => 'List Parameters']);

                if (!$role->hasPermissionTo($permission)) {
                    $role->givePermissionTo($permission);
                }

                \App\Models\Cms\PermissionRouteName::firstOrCreate([
                    'permission' => 'List Parameters',
                    'route_name' => 'back.parameters.index',
                ]);


                dd(get_cached_permission_for_route_name('back.parameters.index'));

            });

            Route::get('permission-add', function () {
                App\Models\Cms\Permission::firstOrCreate(['name' => 'users.manage']);
                App\Models\Cms\Permission::firstOrCreate(['name' => 'users.create']);

                $role = App\Models\Cms\Role::where('name', 'Admin')->first();
                if (!$role->hasPermissionTo('users.manage')) {
                    $role->givePermissionTo('users.manage');
                }
                dd([
                    trans('permissions.' . $role->permissions->first()->name),
                    $role->permissions->toArray(),
                ]);

            });

            Route::get('cached_locales', function () {
                pp(get_cached_app_locale());
            });

            Route::get('error/{code}', function ($code) {
                abort($code);
            });


            Route::get('menu_group_tree', function () {
                generate_menu('menu_principal');
            });

            Route::get('cached-menus', function () {
                pp(get_cached_menus('menu_principal')->toArray());
            });

            Route::get('contact-faker', function () {
                $faker = Faker\Factory::create();

                for ($i = 1; $i < 14; $i++) {

                    $governorate = App\Models\Cms\Governorate::inRandomOrder()->first();

                    App\Contact::create([
                        'menu_id' => null,
                        'first_name' => $faker->firstName,
                        'last_name' => $faker->lastName,
                        'phone' => $faker->phoneNumber,
                        'fax' => null,
                        'address' => $faker->address,
                        'governorate_id' => $governorate->id ?? null,
                        'email' => $faker->email,
                        'read_at' => null,
                        'object' => $faker->sentence(2),
                        'message' => $faker->sentence(2),
                        'name' => null,
                    ]);
                }
            });

            Route::get('seed-countries', function () {
                $locales = config('translatable.locales');

                if (in_array('fr', $locales)) {

                    $data = [
                        [
                            'id' => 1,
                            'fr' => [
                                'name' => 'Tunisie',
                            ],
                        ],
                    ];

                    foreach ($data as $d) {
                        $r = App\Models\Cms\Country::create($d);
                    }
                }

                pp($r);
            });

            Route::get('cache', function () {
                pp(get_cached_parameter_group('smtp')->toArray());
                //pp(get_cached_parameters());
            });

            Route::get('/parameters-groups', function () {
                $parameter_group = App\Models\Cms\ParameterGroup::all();
                pp($parameter_group->keyBy('reference')->toArray());
            });

            Route::get('/', function () {
                return view('back.layouts.app');
            });

            Route::get('template', function () {
                return view('back.layouts.app');
            });

            Route::get('permission', function () {

                $role = App\Models\Cms\Role::firstOrcreate(['name' => 'Super Admin']);
                $permission = App\Models\Cms\Permission::firstOrCreate(['name' => 'menus.index']);

                $user = App\Models\Cms\User::find(1);

                if (!$user->hasRole($role)) {
                    $user->assignRole(1);
                }

                if (!$role->hasPermissionTo($permission)) {
                    $role->givePermissionTo($permission);
                }
            });

            Route::get('menus/create', function () {

                return view('tests.menus.create');
            });

            Route::get('create_empty_page', function () {
                /*        $r = App\Models\Cms\Page::create([
                            'title' => 'hello',
                            'menu_id' => '2',
                            'en' => [
                                'title' => 'yo',
                                'content' => 'cont',
                            ],
                        ]);

                        dd($r->toArray());*/

                $page = App\Models\Cms\Page::createForMenuId(5);
                dd($page->toArray());
            });

        });

    });
endif; // if(env('APP_ENV') == 'local'):
