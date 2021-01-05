<?php

use Illuminate\Support\Str;
use Faker\Generator as Faker;
use App\Models\Cms\UsefulLinkCategory;

$factory->define(UsefulLinkCategory::class, function (Faker $faker) {

    $useful_link_category = [
        'menu_id' => null,
        'order' => rand(0, 100),
        'is_active' => rand(0, 1),
    ];

    foreach (config('translatable.locales') as $locale) {
        $title = $faker->words(rand(1, 3), true) . $locale;

        $useful_link_category['title:' . $locale] = $title;
        $useful_link_category['slug:' . $locale] = Str::slug($title);
        $useful_link_category['description:' . $locale] = 'Desc UsefulLinkCategory ' .
            $locale . ' ' . $faker->sentence(rand(2, 4), true);
    }

    return $useful_link_category;
});
