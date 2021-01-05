<?php

use App\Models\Cms\Menu;
use App\Models\Cms\News;
use Faker\Generator as Faker;

$factory->define(News::class, function (Faker $faker) {

    $menu_id = Menu::whereHas('module', function ($query) {
        $query->whereReference('news');
    })->inRandomOrder()->first()->id;

    $news = [
        'is_active' => rand(0, 1),
        'menu_id' => $menu_id,
    ];


    foreach (config('translatable.locales') as $locale) {
        $name = $faker->words(rand(7, 12), true) . $locale;;
        $description = 'Desc news ' . $locale . ' ' . $faker->sentence(rand(3, 4), true);

        $news['slug:' . $locale] = Str::slug($name);
        $news['name:' . $locale] = $name;
        $news['description:' . $locale] = $locale . ' ' . $description;
        $news['image:' . $locale] = '';
        /*$news['content:' . $locale] = $locale . ' ' . $description;
        $news['meta_title:' . $locale] = $name;
        $news['meta_description:' . $locale] = $description;*/
    }

    return $news;
});
