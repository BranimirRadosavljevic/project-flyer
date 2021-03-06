<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Flyer;
use App\User;
use Faker\Generator as Faker;

$factory->define(Flyer::class, function (Faker $faker) {
    return [
        'user_id' => factory(User::class)->create(),
        'street' => $faker->streetAddress,
        'city' => $faker->city,
        'zip' => $faker->postcode,
        'state' => $faker->state,
        'country' => $faker->country,
        'price' => $faker->numberBetween(10000, 5000000),
        'description' => $faker->paragraph(3)
    ];
});

