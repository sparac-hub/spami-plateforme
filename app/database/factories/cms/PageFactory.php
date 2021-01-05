<?php

use App\Models\Cms\Page;
use Faker\Generator as Faker;

$factory->define(Page::class, function (Faker $faker) {

    $page = [];

    foreach (config('translatable.locales') as $locale) {

        $title = $faker->words(rand(7, 12), true) . $locale;
        $description = 'Desc event ' . $locale . ' ' . $faker->sentence(rand(3, 4), true);

        $page['title:' . $locale] = $locale . ' ' . $title;
        $page['content:' . $locale] = $locale . ' ' . $description;;
        $page['meta_title:' . $locale] = $title;
        $page['meta_description:' . $locale] = $title;
    }

    return $page;
});
