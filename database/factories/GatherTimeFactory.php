<?php

use App\Eloquents\GatherPlace;
use App\Eloquents\GatherPlaceGatherItem;
use App\Eloquents\GatherTime;
use App\Eloquents\Purified;
use Faker\Generator as Faker;

$factory->define(GatherTime::class, function (Faker $faker) {
    return [
        'gather_place_id'=> function () {
            return factory(GatherPlaceGatherItem::class)->create()->gather_place_id;
        },
        'start_time' => $faker->time('H:i:s'),
    ];
});
