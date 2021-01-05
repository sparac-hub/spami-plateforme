<?php

use Illuminate\Support\Str;
use Faker\Generator as Faker;
use App\Models\Cms\TestimonialCategory;

$factory->define(TestimonialCategory::class, function (Faker $faker) {

    $testimonial_category = [
        'menu_id' => null,
        'order' => rand(0, 100),
        'is_active' => rand(0, 1),
    ];

    foreach (config('translatable.locales') as $locale) {
        $title = $faker->words(rand(1, 3), true) . $locale;

        $testimonial_category['title:' . $locale] = $title;
        $testimonial_category['slug:' . $locale] = Str::slug($title);
        $testimonial_category['description:' . $locale] = 'Desc PartnerCategory ' .
            $locale . ' ' . $faker->sentence(rand(2, 4), true);
    }

    return $testimonial_category;
});
