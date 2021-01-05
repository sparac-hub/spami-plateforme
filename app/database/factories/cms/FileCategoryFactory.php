<?php

use App\Models\Cms\Menu;
use Faker\Generator as Faker;
use App\Models\Cms\FileCategory;

$factory->define(FileCategory::class, function (Faker $faker) {

    $file_category = [
        'order' => rand(1, 100),
        'is_active' => rand(0, 1),
        'menu_id' => Menu::whereHas('module',
            function ($query) {
                $query->whereReference('files');
            })
            ->inRandomOrder()
            ->first()
            ->id,
    ];

    foreach (config('translatable.locales') as $locale) {
        $name = $faker->words(rand(2, 5), true);
        $file_category['slug:' . $locale] = \Str::slug($locale . ' ' . $name);
        $file_category['name:' . $locale] = $locale . ' ' . $name;
        $file_category['description:' . $locale] = 'description' . $locale . ' ' . $faker->sentence;
    }

    return $file_category;
});
