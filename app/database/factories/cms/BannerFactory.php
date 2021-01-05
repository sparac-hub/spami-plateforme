<?php

use App\Models\Cms\Banner;
use Faker\Generator as Faker;

$factory->define(Banner::class, function (Faker $faker) {

    $banner = [
        'image_filepath' => $faker->imageUrl($width = 640, $height = 480),
        'video_filepath' => null,
        'script' => null,
        'http_protocol' => null,
        'link_type_id' => null,
        'link_target' => '_self',
        'external_link' => null,
        'internal_link' => null,
        'width' => null,
        'height' => null,
        'type' => 'image_file',
        'thumb' => null,
        'css_class' => null,
        'is_for_mobile' => $faker->boolean,
        'is_active' => $faker->boolean,
        'deleted_by' => null,
        'created_by' => null,
        'updated_by' => null,
    ];

    foreach (config('translatable.locales') as $locale) {

        $title = $faker->words(rand(7, 12), true) . $locale;
        $description = 'Desc event ' . $locale . ' ' . $faker->sentence(rand(3, 4), true);

        $banner['title:' . $locale] = $locale . ' ' . $title;
        $banner['title_2:' . $locale] = null;
        $banner['description:' . $locale] = $locale . ' ' . $description;;
        $banner['meta_title:' . $locale] = null;
        $banner['meta_description:' . $locale] = null;
        $banner['button_title:' . $locale] = null;
        $banner['back_office_title:' . $locale] = ucfirst($faker->words(rand(2, 5), true) . $locale);
    }

    return $banner;
});
