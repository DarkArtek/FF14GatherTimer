<?php

use App\Eloquents\Area;
use App\Eloquents\ClassData;
use App\Eloquents\GatherPlace;
use App\Eloquents\GatherPlaceType;
use Faker\Generator as Faker;

$factory->define(GatherPlace::class, function (Faker $faker) {
    return [
        'name' => $faker->city,
        'class_id'=> function () {
            return factory(ClassData::class)->create()->id;
        },
        'gather_place_type_id'=> function () {
            return factory(GatherPlaceType::class)->create()->id;
        },
        'area_id'=> function () {
            return factory(Area::class)->create()->id;
        },
        'level' => $faker->regexify('[0-9]{2}'),
        'elapsed_time' => $faker->time('H:i:s'),
        'memo' => $faker->realText(),
        'place_point' => '15, 27',
    ];
});
