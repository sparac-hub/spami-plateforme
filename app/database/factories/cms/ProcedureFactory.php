<?php

use App\Models\Cms\Procedure;
use App\Models\Cms\Menu;
use App\Models\Cms\ProcedureCategory;
use Faker\Generator as Faker;

$factory->define(Procedure::class, function (Faker $faker) {

    $procedure_category_id = ProcedureCategory::inRandomOrder()->first()->id;

    $procedure = [
        'order' => rand(1, 100),
        'is_active' => rand(0, 1),
        'procedure_category_id' => $procedure_category_id,
        'menu_id' => null,
        'aspim' => null,
        'publication_date' => $faker->dateTimeBetween('+15 days', '+25 days', $timezone = null),
        'data' => null,
    ];

    foreach (config('translatable.locales') as $locale) {
        $name = $faker->words(rand(1, 3), true) . $locale;
        $procedure['name:' . $locale] = $name;
    }

    return $procedure;
});
