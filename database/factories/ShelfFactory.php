<?php

use App\Eloquents\Region;
use App\Eloquents\Shelf;
use Faker\Generator as Faker;

$factory->define(Shelf::class, function (Faker $faker) {
    return [
        'name' => 'shelf' . $faker->randomNumber,
        'is_hidden' => $faker->boolean,
    ];
});
