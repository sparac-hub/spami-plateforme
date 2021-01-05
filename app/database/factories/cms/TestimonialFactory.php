<?php

use App\Models\Cms\Menu;
use App\Models\Cms\Testimonial;
use Faker\Generator as Faker;

$factory->define(Testimonial::class, function (Faker $faker) {

    $testimonial = [
        'menu_id' => null,
        'is_active' => rand(0, 1),
        'order' => rand(0, 100),
        'testimonial_category_id' => null,
        'image' => 'http://placehold.it/263x230',
        'facebook' => 'https://www.facebook.com/',
        'linkedin' => 'https://fr.linkedin.com/',
        'instagram' => 'https://www.instagram.com/',
        'twitter' => 'https://twitter.com/',
    ];

    foreach (config('translatable.locales') as $locale) {
        $title = $faker->words(rand(1, 3), true) . $locale;

        $testimonial['title:' . $locale] = $title;
        $testimonial['slug:' . $locale] = \Str::slug($title);
        $testimonial['description:' . $locale] = 'Desc TestimonialCategory ' . $locale . ' ' .
            $faker->sentence(rand(2, 4), true);
    }

    return $testimonial;
});
