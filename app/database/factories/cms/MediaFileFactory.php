<?php

use App\Models\Cms\Menu;
use Illuminate\Support\Str;
use App\Models\Cms\MediaFile;
use Faker\Generator as Faker;

$factory->define(MediaFile::class, function (Faker $faker) {

    $mediaFile = [
        'order' => rand(0, 100),
        'url' => 'https://via.placeholder.com/300',
        'is_active' => rand(0, 1),
        'menu_id' => null,
        'type' => MediaFile::IMAGE,
        'media_album_id' => null,
    ];

    foreach (config('translatable.locales') as $locale) {
        $name = $faker->words(rand(7, 12), true) . $locale;;
        $description = 'Desc media ' . $locale . ' ' . $faker->sentence(rand(3, 4), true);

        $mediaFile['slug:' . $locale] = Str::slug($name);
        $mediaFile['name:' . $locale] = $name;
        $mediaFile['description:' . $locale] = $locale . ' ' . $description;
    }

    return $mediaFile;
});
