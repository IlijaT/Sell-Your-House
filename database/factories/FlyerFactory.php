<?php

use Faker\Generator as Faker;

$factory->define(App\Flyer::class, function (Faker $faker) {
    return [
        'user_id' => factory(App\User::class)->create()->id,
        'street' => $faker->streetAddress,
        'city' => $faker->city,
        'zip' => $faker->postcode,
        'country' => $faker->country,
        'price' => $faker->numberBetween(10000, 10000000),
        'description' => $faker->paragraph,
  
    ];
});
