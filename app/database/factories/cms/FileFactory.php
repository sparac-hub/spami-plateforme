<?php

use App\Models\Cms\File;
use App\Models\Cms\Menu;
use App\Models\Cms\FileCategory;
use Faker\Generator as Faker;

$factory->define(File::class, function (Faker $faker) {
    $menu_id = Menu::whereHas(
        'module', function ($query) {
        $query->whereReference('files');
    })
        ->inRandomOrder()
        ->first()
        ->id;

    $file_category_id = FileCategory::inRandomOrder()->first()->id;

    $file = [
        'order' => rand(1, 100),
        'is_active' => rand(0, 1),
        'file_category_id' => $file_category_id,
        'menu_id' => $menu_id,
        'path' => null,
        'extension' => null,
        'size' => null,
        'publication_date' => $faker->dateTimeBetween('+15 days', '+25 days', $timezone = null),
        'data' => null,
    ];

    foreach (config('translatable.locales') as $locale) {
        $name = $faker->words(rand(1, 3), true) . $locale;
        $file['name:' . $locale] = $name;
        $file['description:' . $locale] = $locale . ' ' . $faker->sentences(rand(2, 3), true);
    }

    return $file;
});
