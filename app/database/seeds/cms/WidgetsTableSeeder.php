<?php

use Illuminate\Database\Seeder;
use App\Models\Cms\Module;
use App\Models\Cms\Widget;
use App\Models\Cms\WidgetTranslation;
use App\Models\Cms\Banner;

class WidgetsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        echo " \n * Initializing fake Widgets";

        $events = Module::whereReference('events')->first();
        $news = Module::whereReference('news')->first();
        $banner = Module::whereReference('banners')->first();

        $widgets = [
            [
                'reference' => 'events',
                'placement' => 'right',
                'module_id' => $events->id,
                'select_type' => 'latest',
                'number_for_latest' => 2,
            ],
            [
                'reference' => 'news',
                'placement' => 'right',
                'module_id' => $news->id,
                'select_type' => 'latest',
                'number_for_latest' => 2,
            ],
            [
                'reference' => 'banners',
                'placement' => 'right',
                'module_id' => $banner->id,
                'select_type' => 'latest',
                'number_for_latest' => 2,
            ],
            [
                'reference' => 'banners_bottom',
                'placement' => 'bottom',
                'module_id' => $banner->id,
                'select_type' => 'latest',
                'number_for_latest' => 2,
            ],
        ];

        foreach ($widgets as $widget) {
            $widget['order_column'] = 'id';
            $widget['order_column_type'] = 'desc';
            $widget['type'] = 'free';
            $widget['is_active'] = 1;
            $widget['order'] = 25;

            foreach (config('translatable.locales') as $k => $locale) {
                $widget['name:' . $locale] = $widget['reference'] . ' ' . $locale;
                $widget['description:' . $locale] = $widget['reference'] . ' ' . $locale;
                $widget['button_title:' . $locale] = 'Lire la suite ' . $locale;
            }

            Widget::create($widget);
        }
    }
}
