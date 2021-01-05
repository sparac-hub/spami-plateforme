<?php

use App\Models\Cms\Menu;
use Faker\Generator as Faker;
use App\Models\Cms\UsefulLink;

$factory->define(UsefulLink::class, function (Faker $faker) {

    $protocols = config('cms.http_protocols');

    $menu_id = Menu::whereHas(
        'module', function ($query) {
        $query->whereReference('useful-links');
    })
        ->inRandomOrder()
        ->first()
        ->id;

    $useful_link = [
        'menu_id' => $menu_id,
        'is_active' => rand(0, 1),
        'order' => rand(0, 100),
        'useful_link_category_id' => null,
        'protocol' => $protocols[rand(0, 1)],
        'url' => str_replace($protocols, ['', ''], $faker->url),
        'image' => '',
    ];

    foreach (config('translatable.locales') as $locale) {

        $useful_link['title:' . $locale] = $faker->words(rand(1, 3), true) . $locale;
        $useful_link['description:' . $locale] = 'Desc UsefulLinkCategory ' . $locale . ' ' .
            $faker->sentence(rand(2, 4), true);
    }

    return $useful_link;
});
