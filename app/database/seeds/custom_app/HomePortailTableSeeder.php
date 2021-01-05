<?php

use Illuminate\Database\Seeder;
use App\Models\Cms\Module;
use App\Models\Cms\Widget;
use App\Models\Cms\WidgetTranslation;
use App\Models\Cms\Banner;

class HomePortailTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        echo " \n * Initializing fake Widgets Home ";

        $banner = Module::whereReference('banners')->first();

        $widgets = [
            [
                'reference' => 'first_banners',
                'placement' => 'middle',
                'module_id' => $banner->id,
                'select_type' => 'latest',
                'number_for_latest' => 2,
            ],
            [
                'reference' => 'second_banners',
                'placement' => 'middle',
                'module_id' => $banner->id,
                'select_type' => 'free_select',
            ],
        ];

        foreach ($widgets as $widget) {
            $widget['home_id'] = Widget::HOME_PAGE;
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
