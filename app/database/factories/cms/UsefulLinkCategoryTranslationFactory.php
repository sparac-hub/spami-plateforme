<?php

use Illuminate\Support\Str;
use Faker\Generator as Faker;
use App\Models\Cms\UsefulLinkCategoryTranslation;

$factory->define(UsefulLinkCategoryTranslation::class, function (Faker $faker) {

    $title = $faker->words(rand(6, 12), true);

    return [
        'useful_link_category_id' => null,
        'locale' => null, // fr, en, ar..
        'slug' => Str::slug($title),
        'title' => $title,
        'description' => $faker->paragraphs(rand(2, 4), true),
    ];
});
