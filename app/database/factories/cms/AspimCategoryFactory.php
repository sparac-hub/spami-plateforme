<?php

use App\Models\Cms\Menu;
use Illuminate\Support\Str;
use Faker\Generator as Faker;
use App\Models\Cms\AspimCategory;

$factory->define(AspimCategory::class, function (Faker $faker) {

    $aspim_category = [
        'order' => rand(1, 100),
        'is_active' => rand(0, 1),
        'menu_id' => Menu::whereHas('module',
            function ($query) {
                $query->whereReference('events');
            })->inRandomOrder()->first()->id,
    ];

    foreach (config('translatable.locales') as $locale) {
        $name = $faker->words(rand(2, 5), true);
        $aspim_category['slug:' . $locale] = Str::slug($locale . ' ' . $name);
        $aspim_category['name:' . $locale] = $locale . ' ' . $name;
        $aspim_category['description:' . $locale] = 'description' . $locale . ' ' . $faker->sentence;
    }

    return $aspim_category;
});
