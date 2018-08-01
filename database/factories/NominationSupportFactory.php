<?php

use Faker\Generator as Faker;

$factory->define(\App\NominationSupport::class, function (Faker $faker) {
    return [
        'contribution' => $faker->numberBetween(10, 1000),
        'walk' => $faker->boolean,
        'call' => $faker->boolean,
        'host' => $faker->boolean,
        'yardSign' => $faker->boolean,
        'signPetition' => $faker->boolean,
        'statement' => $faker->paragraph
    ];
});
