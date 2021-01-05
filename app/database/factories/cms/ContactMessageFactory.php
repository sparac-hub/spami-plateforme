<?php

use Faker\Generator as Faker;
use App\Models\Cms\Governorate;
use App\Models\Cms\ContactMessage;

$factory->define(ContactMessage::class, function (Faker $faker) {

    $governorate = Governorate::inRandomOrder()->first();

    return [
        'menu_id' => null,
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'phone' => $faker->phoneNumber,
        'fax' => null,
        'address' => $faker->address,
        'governorate_id' => $governorate->id ?? null,
        'email' => $faker->email,
        'read_at' => null,
        'subject' => $faker->sentence(rand(4, 9)),
        'message' => $faker->paragraphs(rand(2, 3), true),
        'name' => null,
    ];
});
