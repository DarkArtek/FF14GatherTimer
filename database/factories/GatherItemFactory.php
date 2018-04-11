<?php

use App\Eloquents\GatherItem;
use Faker\Generator as Faker;

$factory->define(GatherItem::class, function (Faker $faker) {
    return [
        'name' => $faker->company,
        'level' => $faker->regexify('[0-9]{2}'),
        'star' => $faker->randomElement([0,1,2,3]),
        'is_limit' => $faker->boolean ,
        'patch' => $faker->regexify('[0-9]\.[0-9]'),
        'memo' => $faker->realText(),
        'icon' => 'a.png',
    ];
});
