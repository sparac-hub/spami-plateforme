<?php

use App\Models\Cms\Menu;
use Faker\Generator as Faker;
use App\Models\Cms\NewsCategory;

$factory->define(NewsCategory::class, function (Faker $faker) {

    $data = [
        'order' => rand(1, 100),
        'is_active' => rand(0, 1),
        'menu_id' => null,
    ];

    foreach (config('translatable.locales') as $locale) {
        $name = $faker->words(rand(2, 5), true);
        $data['slug:' . $locale] = \Str::slug($locale . ' ' . $name);
        $data['name:' . $locale] = $locale . ' ' . $name;
        $data['description:' . $locale] = 'description' . $locale . ' ' . $faker->sentence;
    }

    return $data;
});
