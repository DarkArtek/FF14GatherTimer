<?php

use App\Eloquents\Purified;
use Faker\Generator as Faker;

$factory->define(Purified::class, function (Faker $faker) {
    return [
        'name' => $faker->company,
    ];
});
