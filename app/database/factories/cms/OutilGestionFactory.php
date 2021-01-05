<?php

use App\Models\Cms\Menu;
use App\Models\Cms\OutilGestion;
use Faker\Generator as Faker;

$factory->define(OutilGestion::class, function (Faker $faker) {

    $menu_id = Menu::whereHas('module', function ($query) {
        $query->whereReference('outil_gestions');
    })
        ->inRandomOrder()
        ->first()
        ->id;

    $outil_gestion = [
        'is_active' => rand(0, 1),
        'start_date' => $faker->dateTimeBetween('+15 days', '+25 days', $timezone = null),
        'end_date' => $faker->dateTimeBetween('+30 days', '+120 days', $timezone = null),
        'menu_id' => $menu_id,
    ];

    foreach (config('translatable.locales') as $locale) {
        $name = $faker->words(rand(7, 12), true) . $locale;;
        $description = 'Desc outil_gestion ' . $locale . ' ' . $faker->sentence(rand(3, 4), true);

        $outil_gestion['slug:' . $locale] = \Str::slug($name);
        $outil_gestion['name:' . $locale] = $name;
        $outil_gestion['description:' . $locale] = $locale . ' ' . $description;
        $outil_gestion['image:' . $locale] = '';
        $outil_gestion['content:' . $locale] = $locale . ' ' . $description;
        $outil_gestion['meta_title:' . $locale] = $name;
        $outil_gestion['meta_description:' . $locale] = $description;
    }

    return $outil_gestion;
});
