<?php

use App\Models\Cms\Menu;
use Faker\Generator as Faker;
use App\Models\Cms\ProcedureCategory;

$factory->define(ProcedureCategory::class, function (Faker $faker) {

    $procedure_category = [
        'order' => rand(1, 100),
        'is_active' => rand(0, 1),
        'menu_id' => null
    ];

    foreach (config('translatable.locales') as $locale) {
        $name = $faker->words(rand(2, 5), true);
        $procedure_category['slug:' . $locale] = \Str::slug($locale . ' ' . $name);
        $procedure_category['name:' . $locale] = $locale . ' ' . $name;
        $procedure_category['description:' . $locale] = 'description' . $locale . ' ' . $faker->sentence;
    }

    return $procedure_category;
});
