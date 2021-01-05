<?php

use App\Models\Cms\Menu;
use App\Models\Cms\Aspim;
use Faker\Generator as Faker;

$factory->define(Aspim::class, function (Faker $faker) {

    $menu_id = Menu::whereHas('module', function ($query) {
        $query->whereReference('aspims');
    })
        ->inRandomOrder()
        ->first()
        ->id;

    $aspim = [
        'is_active' => rand(0, 1),
        'start_date' => $faker->dateTimeBetween('+15 days', '+25 days', $timezone = null),
        'end_date' => $faker->dateTimeBetween('+30 days', '+120 days', $timezone = null),
        'menu_id' => $menu_id,
    ];

    foreach (config('translatable.locales') as $locale) {
        $name = $faker->words(rand(7, 12), true) . $locale;;
        $description = 'Desc aspim ' . $locale . ' ' . $faker->sentence(rand(3, 4), true);

        $aspim['slug:' . $locale] = \Str::slug($name);
        $aspim['name:' . $locale] = $name;
        $aspim['description:' . $locale] = $locale . ' ' . $description;
        $aspim['image:' . $locale] = '';
        $aspim['content:' . $locale] = $locale . ' ' . $description;
        $aspim['meta_title:' . $locale] = $name;
        $aspim['meta_description:' . $locale] = $description;
    }

    return $aspim;
});
