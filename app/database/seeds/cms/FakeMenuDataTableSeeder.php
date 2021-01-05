<?php

use Illuminate\Database\Seeder;

use App\Models\Cms\Page;
use App\Models\Cms\Menu;
use App\Models\Cms\Event;
use App\Models\Cms\Module;
use App\Models\Cms\LinkType;
use App\Models\Cms\Parameter;
use App\Models\Cms\MenuGroup;
use App\Models\Cms\PartnerCategory;
use App\Models\Cms\UsefulLinkCategory;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Str;

class FakeMenuDataTableSeeder extends Seeder
{
    protected $active_locales;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Cache::forget('active_locales'); // Update active locales [bugfix: during the installation of demo]
        config(['translatable.locales' => get_translatable_locales()]);

        $this->active_locales = get_translatable_locales();

        config(['activitylog.enabled' => false]);

        // Main menu
        $mainMenuId = MenuGroup::whereReference('main-menu')->first()->id;
        $this->home($mainMenuId);
        /*$this->faq($mainMenuId, 'FAQ');
        $this->event($mainMenuId, 'Event');
        $this->news($mainMenuId, 'News');
        $this->partners($mainMenuId, 'Partners');
        $this->useful_links($mainMenuId, 'UsefulLink');
        $this->files($mainMenuId, 'Files');
        $this->pages($mainMenuId, 'Page 1');
        $this->media_files($mainMenuId, 'Média');
        $this->testimonials($mainMenuId, 'Témoignages');
        $this->training($mainMenuId, 'Formations');
        $this->contact($mainMenuId, 'Contact Us');*/

        // left menu
        $leftMenuId = MenuGroup::whereReference('left-menu')->first()->id;
        $this->external_link($leftMenuId, 'https://', 'www.google.com');
    }

    public function home(int $menuGroupId)
    {
        $moduleId = Module::whereReference('home')->first()->id;

        $this->menuFactory($menuGroupId, $moduleId, 'Home');
    }

    public function menuFactory(int $menuGroupId, int $moduleId, string $label): Menu
    {
        $menu = [
            //'id' => '',
            'menu_group_id' => $menuGroupId,
            'module_id' => $moduleId,
            //'route_name' => '',
            //'route_parameters' => '',
            //'parent_id' => '',
            //'link_type_id' => '',
            'http_protocol' => null,
            'external_link' => null,
            'internal_link' => null,
            'link_target' => null,
            'is_active' => 1,
            'icon' => '',
            'order' => 10,
            'css_class' => '',
            'image1' => '',
        ];

        foreach (config('translatable.locales') as $locale) {
            $menu[$locale] = [
                //'id' => '',
                //'menu_id' => '',
                'locale' => $locale,
                'label' => $locale . ' ' . $label,
                'slug' => Str::slug($locale . ' ' . $label),
                'meta_title' => $locale . ' ' . $label,
                'meta_description' => $locale . ' ' . $label,
                'content' => $locale . ' ' . $label,
            ];
        }

        return Menu::create($menu);
    }

    public function external_link(int $menuGroupId, string $http, string $url)
    {
        $linkType = LinkType::whereReference('external_link')->first()->id;

        $data = [
            //'id' => '',
            'menu_group_id' => $menuGroupId,
            'module_id' => null,
            //'parent_id' => '',
            'link_type_id' => $linkType,
            'http_protocol' => $http,
            'external_link' => $url,
            'internal_link' => null,
            'link_target' => '_blank',
            'is_active' => false,
            'icon' => '',
            'order' => 10,
            'css_class' => '',
            'image1' => '',
        ];

        foreach ($this->active_locales as $key => $locale) {
            $data[$locale] = [
                //'id' => '',
                //'menu_id' => '',
                'locale' => $locale,
                'label' => $locale . ' google ',
                'slug' => Str::slug($locale . ' google '),
                'meta_title' => $locale . ' meta title ',
                'meta_description' => $locale . ' meta description ',
                'content' => $locale . ' menu content ',
            ];
        }

        Menu::create($data);
    }

    public function faq(int $menuGroupId, string $label)
    {
        $moduleId = Module::whereReference('faqs')->first()->id;

        $menu = $this->menuFactory($menuGroupId, $moduleId, $label);

        factory('App\Models\Cms\FaqCategory', rand(5, 8))->create([
            'menu_id' => $menu->id,
        ])->each(function ($model_category) use ($menu) {
            $model_category->faq_items()->saveMany(factory('App\Models\Cms\FaqItem', rand(5, 10))->make([
                'menu_id' => $menu->id,
            ]));
        });
    }

    public function event(int $menuGroupId, string $label)
    {
        $moduleId = Module::whereReference('events')->first()->id;

        $menu = $this->menuFactory($menuGroupId, $moduleId, $label);

        factory('App\Models\Cms\EventCategory', rand(5, 8))->create([
            'menu_id' => $menu->id,
        ])->each(function ($model_category) use ($menu) {
            $model_category->events()->saveMany(factory('App\Models\Cms\Event', rand(5, 10))->make([
                'menu_id' => $menu->id,
            ]));
        });
    }

    public function news(int $menuGroupId, string $label)
    {
        $moduleId = Module::whereReference('news')->first()->id;

        $menu = $this->menuFactory($menuGroupId, $moduleId, $label);

        factory('App\Models\Cms\NewsCategory', rand(5, 8))->create([
            'menu_id' => $menu->id,
        ])->each(function ($model_category) use ($menu) {
            $model_category->news()->saveMany(factory('App\Models\Cms\News', rand(5, 10))->make([
                'menu_id' => $menu->id,
            ]));
        });
    }

    public function partners(int $menuGroupId, string $label)
    {
        $moduleId = Module::whereReference('partners')->first()->id;

        $menu = $this->menuFactory($menuGroupId, $moduleId, $label);

        $menu->update(['is_active' => false]);

        factory('App\Models\Cms\PartnerCategory', rand(5, 8))->create([
            'menu_id' => $menu->id,
        ])->each(function ($model_category) use ($menu) {
            $model_category->partners()->saveMany(factory('App\Models\Cms\Partner', rand(5, 10))->make([
                'menu_id' => $menu->id,
            ]));
        });
    }

    public function useful_links(int $menuGroupId, string $label)
    {
        $moduleId = Module::whereReference('useful-links')->first()->id;

        $menu = $this->menuFactory($menuGroupId, $moduleId, $label);

        factory('App\Models\Cms\UsefulLinkCategory', rand(5, 8))->create([
            'menu_id' => $menu->id,
        ])->each(function ($model_category) use ($menu) {
            $model_category->useful_links()->saveMany(factory('App\Models\Cms\UsefulLink', rand(5, 10))->make([
                'menu_id' => $menu->id,
            ]));
        });
    }

    public function files(int $menuGroupId, string $label)
    {
        $moduleId = Module::whereReference('files')->first()->id;

        $menu = $this->menuFactory($menuGroupId, $moduleId, $label);

        factory('App\Models\Cms\FileCategory', rand(5, 8))->create([
            'menu_id' => $menu->id,
        ])->each(function ($model_category) use ($menu) {
            $model_category->files()->saveMany(factory('App\Models\Cms\File', rand(5, 10))->make([
                'menu_id' => $menu->id,
            ]));
        });
    }

    public function testimonials(int $menuGroupId, string $label)
    {
        $moduleId = Module::whereReference('testimonials')->first()->id;

        $menu = $this->menuFactory($menuGroupId, $moduleId, $label);

        factory('App\Models\Cms\TestimonialCategory', rand(5, 8))->create([
            'menu_id' => $menu->id,
        ])->each(function ($model_category) use ($menu) {
            $model_category->testimonials()->saveMany(factory('App\Models\Cms\Testimonial', rand(5, 10))->make([
                'menu_id' => $menu->id,
            ]));
        });
    }

    public function pages(int $menuGroupId, string $label)
    {
        $moduleId = Module::whereReference('pages')->first()->id;

        $menu = $this->menuFactory($menuGroupId, $moduleId, $label);

        factory('App\Models\Cms\Page')->create([
            'menu_id' => $menu->id,
        ]);
    }

    public function contact(int $menuGroupId, string $label)
    {
        $module = Module::whereReference('contact-messages')->first();

        if ($module) {
            $data = [
                //'id' => '',
                'menu_group_id' => $menuGroupId,
                'module_id' => $module->id,
                'parent_id' => null,
                'link_type_id' => null,
                'http_protocol' => null,
                'external_link' => null,
                'internal_link' => null,
                'link_target' => null,
                'is_active' => 1,
                'icon' => '',
                'order' => 100,
                'css_class' => '',
            ];


            foreach ($this->active_locales as $key => $locale) {
                $data[$locale] = [
                    //'id' => '',
                    //'menu_id' => '',
                    'locale' => $locale,
                    'label' => $locale . ' ' . $label,
                    'slug' => Str::slug($locale . ' ' . $label),
                    'meta_title' => $locale . ' ' . $label,
                    'meta_description' => $locale . ' ' . $label,
                    'content' => $locale . ' ' . $label,
                ];
            }

            Menu::create($data);
        }
    }

    public function media_files(int $menuGroupId, string $label)
    {
        $moduleId = Module::whereReference('media')->first()->id;

        $menu = $this->menuFactory($menuGroupId, $moduleId, $label);

        factory('App\Models\Cms\MediaAlbumCategory', rand(5, 8))
            ->create([
                'menu_id' => $menu->id,
            ])
            ->each(function ($model_category) use ($menu) {
                $model_category->albums()->save(factory('App\Models\Cms\MediaAlbum')->create([
                    'menu_id' => $menu->id,
                    'media_album_category_id' => $model_category->id,
                ]))
                    ->each(function ($model) use ($menu) {
                        $model->files()->save(factory('App\Models\Cms\MediaFile')->create([
                            'menu_id' => $menu->id,
                            'media_album_id' => $model->id,
                        ]));
                    });
            });
    }

    public function training(int $menuGroupId, string $label)
    {
        $moduleId = Module::whereReference('trainings')->first()->id;

        $menu = $this->menuFactory($menuGroupId, $moduleId, $label);

        factory('App\Models\Cms\TrainingCategory', rand(5, 8))->create([
            'menu_id' => $menu->id,
        ])->each(function ($model_category) use ($menu) {
            $model_category->trainings()->saveMany(factory('App\Models\Cms\Training', rand(5, 10))->make([
                'menu_id' => $menu->id,
            ]));
        });
    }

}
