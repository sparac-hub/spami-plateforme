<?php

use App\Models\Cms\Menu;
use App\Models\Cms\Event;
use Faker\Generator as Faker;

$factory->define(Event::class, function (Faker $faker) {

    $menu_id = Menu::whereHas('module', function ($query) {
        $query->whereReference('events');
    })
        ->inRandomOrder()
        ->first()
        ->id;

    $event = [
        'is_active' => rand(0, 1),
        'start_date' => $faker->dateTimeBetween('+15 days', '+25 days', $timezone = null),
        'end_date' => $faker->dateTimeBetween('+30 days', '+120 days', $timezone = null),
        'menu_id' => $menu_id,
    ];

    foreach (config('translatable.locales') as $locale) {
        $name = $faker->words(rand(7, 12), true) . $locale;;
        $description = 'Desc event ' . $locale . ' ' . $faker->sentence(rand(3, 4), true);

        $event['slug:' . $locale] = \Str::slug($name);
        $event['name:' . $locale] = $name;
        $event['description:' . $locale] = $locale . ' ' . $description;
        $event['image:' . $locale] = '';
        $event['content:' . $locale] = $locale . ' ' . $description;
        $event['meta_title:' . $locale] = $name;
        $event['meta_description:' . $locale] = $description;
    }

    return $event;
});
