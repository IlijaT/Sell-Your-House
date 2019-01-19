<?php

use Faker\Generator as Faker;

$factory->define(App\Photo::class, function (Faker $faker) {
    return [
        'flyer_id' => factory(App\Flyer::class)->create()->id,
        'photo' => $faker->sentence,
    ];
});
