<?php

use App\Eloquents\ClassData;
use App\Eloquents\GatherItem;
use App\Eloquents\GatherItemPurified;
use App\Eloquents\Purified;
use Faker\Generator as Faker;

$factory->define(GatherItemPurified::class, function (Faker $faker) {
    return [
        'gather_item_id'=> function () {
            return factory(GatherItem::class)->create()->id;
        },
        'purified_id' => function () {
            return factory(Purified::class)->create()->id;
        },
    ];
});
