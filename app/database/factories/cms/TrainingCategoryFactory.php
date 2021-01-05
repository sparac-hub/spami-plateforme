<?php

use App\Models\Cms\Menu;
use Illuminate\Support\Str;
use Faker\Generator as Faker;
use App\Models\Cms\TrainingCategory;

$factory->define(TrainingCategory::class, function (Faker $faker) {

    $training_category = [
        'order' => rand(1, 100),
        'is_active' => rand(0, 1),
        'menu_id' => Menu::whereHas(
            'module', function ($query) {
            $query->whereReference('trainings');
        })
            ->inRandomOrder()
            ->first()
            ->id,
    ];

    foreach (config('translatable.locales') as $locale) {
        $name = $faker->words(rand(2, 5), true);
        $training_category['slug:' . $locale] = Str::slug($locale . ' ' . $name);
        $training_category['name:' . $locale] = $locale . ' ' . $name;
        $training_category['description:' . $locale] = 'description' .
            $locale . ' ' . $faker->sentence;
    }

    return $training_category;
});
