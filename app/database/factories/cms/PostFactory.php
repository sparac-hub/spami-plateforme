<?php

use App\Models\Cms\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {

    $post = [
        'post_category_id' => null,
        'order' => rand(1, 100),
        'is_active' => rand(0, 1),
    ];

    foreach (config('translatable.locales') as $locale) {
        $title = $faker->sentence(rand(6, 11));

        $post['title:' . $locale] = $title;
        $post['slug:' . $locale] = \Str::slug($title);
        $post['content:' . $locale] = 'Post content ' . $locale . ' ' .
            $faker->sentences(rand(1, 4), true);
        $post['meta_title:' . $locale] = $faker->words(rand(1, 3), true) . $locale;
        $post['meta_description:' . $locale] = 'Post metadesc ' . $locale . ' ' .
            $faker->sentence(rand(4, 12), true);
    }

    return $post;
});
