<?php

use Illuminate\Support\Str;
use Faker\Generator as Faker;
use App\Models\Cms\PartnerCategory;

$factory->define(PartnerCategory::class, function (Faker $faker) {

    $partner_category = [
        'menu_id' => null,
        'order' => rand(0, 100),
        'is_active' => rand(0, 1),
    ];

    foreach (config('translatable.locales') as $locale) {
        $title = $faker->words(rand(1, 3), true) . $locale;

        $partner_category['title:' . $locale] = $title;
        $partner_category['slug:' . $locale] = Str::slug($title);
        $partner_category['description:' . $locale] = 'Desc PartnerCategory ' .
            $locale . ' ' . $faker->sentence(rand(2, 4), true);
    }

    return $partner_category;
});
