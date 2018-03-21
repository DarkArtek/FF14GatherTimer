<?php

use App\Eloquents\GatherPlaceType;
use Faker\Generator as Faker;

$factory->define(GatherPlaceType::class, function (Faker $faker) {
    return [
        'name' => $faker->prefecture,
    ];
});
