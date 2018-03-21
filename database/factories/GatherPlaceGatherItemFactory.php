<?php

use App\Eloquents\GatherItem;
use App\Eloquents\GatherPlace;
use App\Eloquents\GatherPlaceGatherItem;
use App\Eloquents\Shelf;
use Faker\Generator as Faker;

$factory->define(GatherPlaceGatherItem::class, function (Faker $faker) {
    return [
        'gather_place_id'=> function () {
            return factory(GatherPlace::class)->create()->id;
        },
        'gather_item_id'=> function () {
            return factory(GatherItem::class)->create()->id;
        },
        'shelf_id'=> function () {
            return factory(Shelf::class)->create()->id;
        },
    ];
});
