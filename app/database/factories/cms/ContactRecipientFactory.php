<?php

use Faker\Generator as Faker;
use App\Models\Cms\ContactRecipient;

$factory->define(ContactRecipient::class, function (Faker $faker) {

    return [
        'menu_id' => null,
        'email' => $faker->email,
    ];
});
