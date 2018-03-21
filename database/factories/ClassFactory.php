<?php

use App\Eloquents\ClassData;
use Faker\Generator as Faker;

$factory->define(ClassData::class, function (Faker $faker) {
    return [
        'name' => $faker->jobTitle,
    ];
});
