<?php

use App\Models\Cms\Menu;
use Illuminate\Support\Str;
use Faker\Generator as Faker;
use App\Models\Cms\OutilGestionCategory;

$factory->define(OutilGestionCategory::class, function (Faker $faker) {

    $outil_gestion_category = [
        'order' => rand(1, 100),
        'is_active' => rand(0, 1),
        'menu_id' => Menu::whereHas('module',
            function ($query) {
                $query->whereReference('events');
            })->inRandomOrder()->first()->id,
    ];

    foreach (config('translatable.locales') as $locale) {
        $name = $faker->words(rand(2, 5), true);
        $outil_gestion_category['slug:' . $locale] = Str::slug($locale . ' ' . $name);
        $outil_gestion_category['name:' . $locale] = $locale . ' ' . $name;
        $outil_gestion_category['description:' . $locale] = 'description' . $locale . ' ' . $faker->sentence;
    }

    return $outil_gestion_category;
});
