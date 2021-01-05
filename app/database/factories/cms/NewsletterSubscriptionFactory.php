<?php

use Faker\Generator as Faker;
use App\Models\Cms\NewsletterSubscription;

$factory->define(NewsletterSubscription::class, function (Faker $faker) {
    return [
        'email' => $faker->email,
    ];
});
