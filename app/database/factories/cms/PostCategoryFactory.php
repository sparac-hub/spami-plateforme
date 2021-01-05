<?php

use Faker\Generator as Faker;
use App\Models\Cms\PostCategory;

$factory->define(PostCategory::class, function (Faker $faker) {

    $post_category = [
        'menu_id' => null,
        'order' => rand(1, 100),
        'is_active' => rand(0, 1),
    ];

    foreach (config('translatable.locales') as $locale) {
        $post_category['name:' . $locale] = $faker->words(rand(1, 3), true) . $locale;
        $post_category['description:' . $locale] = 'Post Category description ' . $locale .
            ' ' . $faker->sentences(rand(1, 4), true);
    }

    return $post_category;
});
