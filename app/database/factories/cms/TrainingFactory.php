<?php

use App\Models\Cms\Menu;
use Illuminate\Support\Str;
use App\Models\Cms\Training;
use Faker\Generator as Faker;

$factory->define(Training::class, function (Faker $faker) {

    $menu_id = Menu::whereHas('module', function ($query) {
        $query->whereReference('trainings');
    })
        ->inRandomOrder()
        ->first()
        ->id;

    $training = [
        'is_active' => rand(0, 1),
        'start_date' => $faker->dateTimeBetween('+15 days', '+25 days', $timezone = null),
        'end_date' => $faker->dateTimeBetween('+30 days', '+120 days', $timezone = null),
        'menu_id' => $menu_id,
    ];

    foreach (config('translatable.locales') as $locale) {
        $name = $faker->words(rand(7, 12), true) . $locale;;
        $description = 'Desc training ' . $locale . ' ' . $faker->sentence(rand(3, 4), true);

        $training['slug:' . $locale] = Str::slug($name);
        $training['name:' . $locale] = $name;
        $training['description:' . $locale] = $locale . ' ' . $description;
        $training['image:' . $locale] = '';
        $training['content:' . $locale] = $locale . ' ' . $description;
        $training['meta_title:' . $locale] = $name;
        $training['meta_description:' . $locale] = $description;
    }

    return $training;
});
