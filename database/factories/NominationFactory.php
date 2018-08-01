<?php

use Faker\Generator as Faker;

$factory->define(\App\Nomination::class, function (Faker $faker) {
    return [
        'office' => 'State Legislator',
        'district' => 'District ' . random_int(1,50),
        'count' => 1
    ];
});
