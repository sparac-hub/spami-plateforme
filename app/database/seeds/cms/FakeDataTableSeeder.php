<?php

use Illuminate\Database\Seeder;

use App\Models\Cms\UsefulLinkCategory;
use App\Models\Cms\PartnerCategory;
use App\Models\Cms\MenuGroup;
use App\Models\Cms\Parameter;
use App\Models\Cms\LinkType;
use App\Models\Cms\Module;
use App\Models\Cms\Event;
use App\Models\Cms\Menu;
use App\Models\Cms\User;
use App\Models\Cms\Page;
use App\Models\Cms\Widget;
use App\Models\Cms\WidgetTranslation;
use App\Models\Cms\WidgetElement;
use App\Models\Cms\WidgetMenu;

use App\Notifications\ContactMessageFormSubmitted;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Str;

class FakeDataTableSeeder extends Seeder
{
    protected $organization_tags_number = 30; // 60
    protected $organizations_number = 30; // 1400
    protected $active_locales;
    protected $mainMenuFaq = null;

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
        echo " \n ******* Starting fake Data Seeder ******* \n";
        /*$this->menus();
        $this->menus_trainings();
        $this->menus_contact();
        $this->notifications();
        $this->contact_messages();
        $this->contact_recipients();
        $this->newsletter_subscription();
        $this->galleries();
        $this->posts();*/
        $this->setApplicationParameters();
        $this->banners();
        echo "\n";
        config(['activitylog.enabled' => true]);
    }

    public function setApplicationParameters()
    {
        echo " \n * Creating fake App Parameters";

        $faker = Faker\Factory::create();

        $parameters = [
            ['reference' => 'email', 'value' => 'contact@medianet.test'],
            ['reference' => 'phone', 'value' => '+ 123 456 789'],
            [
                'reference' => 'description',
                'value' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam. Sed nisi. Nulla quis sem at nibh elementum imperdiet. Duis sagittis ipsum. Praesent mauris. Fusce nec tellus sed augue semper porta. Mauris massa. Vestibulum lacinia arcu eget nulla. ',
            ],
            // Social
            ['reference' => 'facebook', 'value' => 'https://fb.com/cms.laravel.dev'],
            ['reference' => 'instagram', 'value' => 'https://instagram.com/cms.laravel.dev'],
            ['reference' => 'youtube', 'value' => 'https://youtube.com/CmsLaravelDev'],
            ['reference' => 'twitter', 'value' => 'https://twitter.com/@CmsLaravelDev'],
            ['reference' => 'linkedin', 'value' => 'https://linkdin.com/in/CmsLaravelDev'],
            ['reference' => 'google_plus', 'value' => 'https://plus.google.com/+CmsLaravelDev'],
            ['reference' => 'vimeo', 'value' => 'https://vimeo.com/+CmsLaravelDev'],
            ['reference' => 'rss', 'value' => 'https://cms-laravel.test/rss'],
            // Colors
            ['reference' => 'color', 'value' => $faker->hexcolor],
            ['reference' => 'color_code', 'value' => $faker->hexcolor],
            ['reference' => 'label_color_code', 'value' => $faker->hexcolor],
            ['reference' => 'background_color_code', 'value' => $faker->hexcolor],
        ];

        foreach ($parameters as $parameter) {
            if ($p = Parameter::where('reference', $parameter['reference'])->first()) {
                $p->update($parameter);
            }
        }
    }

    public function banners()
    {
        factory('App\Models\Cms\Banner', 22)->create();
    }

    public function menus()
    {
        echo " \n * Creating fake Menus";

        for ($i = 1; $i < 27; $i++) {

            // Random Menu Except ("Main Menu")
            $menu_group_id = MenuGroup::inRandomOrder()->whereNotIn('id', [1])->first()->id;

            $module_id = Module::whereIsMenuModule(true)->inRandomOrder()->first()->id;

            $data = [
                //'id' => '',
                'menu_group_id' => $menu_group_id,
                'module_id' => $module_id,
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
            ];

            foreach ($this->active_locales as $locale) {
                $data[$locale] = [
                    //'id' => '',
                    //'menu_id' => '',
                    'locale' => $locale,
                    'label' => $locale . ' lbl ' . $i,
                    'slug' => str_slug($locale . ' lbl ' . $i),
                    'meta_title' => $locale . ' meta title ' . $i,
                    'meta_description' => $locale . ' meta description ' . $i,
                    'content' => $locale . ' menu content ' . $i,
                ];
            }

            $menu = Menu::create($data);

            $pageModule = Module::whereReference('pages')->first();
            if (isset($pageModule->id) && $menu->module_id == $pageModule->id) { // If (module_id == 7 ('page')) create an empty page and link it to $menu
                Page::createForMenuId($menu->id);
            }
        }
    }

    public function menus_trainings()
    {
        $menu_group_id = 1; // Main menu
        $module = Module::where('reference', 'trainings')->first(); // External Link

        if ($module) {
            $data = [
                //'id' => '',
                'menu_group_id' => $menu_group_id,
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
                    'label' => $locale . ' Training ',
                    'slug' => str_slug($locale . ' Training'),
                    'meta_title' => $locale . ' meta title Training',
                    'meta_description' => $locale . ' meta description Training',
                    'content' => $locale . ' menu content Training',
                ];
            }

            $menu = Menu::create($data);

            factory('App\Models\Cms\TrainingCategory', rand(2, 3))->create()->each(function ($training_category) {
                $training_category->trainings()->saveMany(factory('App\Models\Cms\Training', rand(1, 3))->make());
            })->each(function ($training_category) use ($menu) {
                $training_category->update(['menu_id' => $menu->id]);
                $training_category->trainings->each(function ($training) use ($menu) {
                    $training->update(['menu_id' => $menu->id]);
                });
            });
        }
    }

    public function notifications()
    {
        echo " \n * Creating fake Notifications";
        $faker = Faker\Factory::create();

        for ($i = 0; $i < 24; $i++) {
            $notifications [] = [
                'name' => $faker->name,
                'phone' => $faker->phoneNumber,
                'email' => $faker->email,
                'message' => $faker->sentence(rand(12, 25)),
            ];
        }

        foreach ($notifications as $notification) {
            // Todo : User::first() ? => change this if needed.
            // Notification::send(User::first(), new ContactMessageFormSubmitted($notification));
        }
    }

    public function contact_recipients()
    {
        echo " \n * Creating fake Contact Recipients";
        factory('App\Models\Cms\ContactMessage', 2)->create();

    }

    public function contact_messages()
    {
        /* !!! Check smtp config before running this !!!
        echo " \n * Creating fake contacts";
        factory('App\Models\Cms\ContactMessage', rand(1, 2))->create();
        */
    }

    public function newsletter_subscription()
    {
        echo " \n * Creating fake Newsletter Subscriptions";
        factory('App\Models\Cms\NewsletterSubscription', 17)->create();
    }

    public function galleries()
    {
        factory('App\Models\Cms\Gallery', 3)->create();
    }

    public function posts()
    {
        echo "\n * Creating fake Post Categories and Posts \n";
        factory('App\Models\Cms\PostCategory', rand(5, 8))->create()->each(function ($post_category) {
            $post_category->posts()->saveMany(factory('App\Models\Cms\Post', rand(7, 13))->make());
        });
    }
}
