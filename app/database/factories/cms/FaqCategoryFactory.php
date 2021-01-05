<?php

use App\Models\Cms\Menu;
use Illuminate\Support\Str;
use Faker\Generator as Faker;
use App\Models\Cms\FaqCategory;

$factory->define(FaqCategory::class, function (Faker $faker) {

    $menu_id = Menu::whereHas(
        'module', function ($query) {
        $query->whereReference('faqs');
    })
        ->inRandomOrder()
        ->first()
        ->id;

    $faq_category = [
        'order' => rand(1, 100),
        'is_active' => rand(0, 1),
        'menu_id' => $menu_id,
    ];

    foreach (config('translatable.locales') as $locale) {
        $name = $faker->words(rand(2, 5), true);

        $faq_category['slug:' . $locale] = Str::slug($locale . ' ' . $name);
        $faq_category['name:' . $locale] = $locale . ' ' . $name;
        $faq_category['description:' . $locale] = 'description' . $locale . ' ' . $faker->sentence;
    }

    return $faq_category;
});
