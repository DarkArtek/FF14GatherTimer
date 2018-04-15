<?php

namespace App\Repositories\Interfaces;

use App\Eloquents\GatherItem;
use App\Eloquents\GatherPlaceGatherItem;

interface GatherPlaceGatherItemRepositoryInterface
{
    /**
     * レコードの作成もしくは更新
     *
     * @param GatherItem $gatherPlaceGatherItem
     * @return bool
     */
    public function save(GatherPlaceGatherItem $gatherPlaceGatherItem);
}
