<?php

use App\Models\Cms\Menu;
use App\Models\Cms\Partner;
use Faker\Generator as Faker;

$factory->define(Partner::class, function (Faker $faker) {

    $protocols = config('cms.http_protocols');

    $menu_id = Menu::whereHas(
        'module', function ($query) {
        $query->whereReference('partners');
    })->inRandomOrder()->first()->id;

    $partner = [
        'menu_id' => $menu_id,
        'is_active' => rand(0, 1),
        'order' => rand(0, 100),
        'partner_category_id' => null,
        'protocol' => $protocols[rand(0, 1)],
        'url' => str_replace($protocols, ['', ''], $faker->url),
        'image' => '',
    ];

    foreach (config('translatable.locales') as $locale) {
        $partner['title:' . $locale] = $faker->words(rand(1, 3), true) . $locale;
        $partner['description:' . $locale] = 'Desc PartnerCategory ' . $locale . ' ' .
            $faker->sentence(rand(2, 4), true);
    }

    return $partner;
});
