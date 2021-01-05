<?php

use App\Models\Cms\Menu;
use App\Models\Cms\FaqItem;
use Faker\Generator as Faker;

$factory->define(FaqItem::class, function (Faker $faker) {

    $menu_id = Menu::whereHas(
        'module', function ($query) {
        $query->whereReference('faqs');
    })
        ->inRandomOrder()
        ->first()
        ->id;

    $faq_item = [
        'order' => rand(1, 100),
        'is_active' => rand(0, 1),
        'faq_category_id' => null,
        'menu_id' => $menu_id,
    ];

    foreach (config('translatable.locales') as $locale) {
        $faq_item['question:' . $locale] = $locale . ' ' . $faker->sentence(rand(6, 12));
        $faq_item['answer:' . $locale] = $locale . ' ' . $faker->sentences(rand(2, 3), true);
        // $faq_item['image:'.$locale] = $locale.' '.$faker;
        // $faq_item['thumb:'.$locale] = $locale.' '.$faker;
    }

    return $faq_item;
});
