<?php

use App\Eloquents\Area;
use App\Eloquents\Region;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(Area::class, function (Faker $faker) {
    return [
        'name' => $faker->prefecture,
        'region_id' => function () {
            return factory(Region::class)->create()->id;
        },
        'patch' => $faker->regexify('[0-9]\.[0-9]'),
        'map' =>  'a.png',
    ];
});
