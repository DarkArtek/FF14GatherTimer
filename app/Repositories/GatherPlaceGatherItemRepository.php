<?php

namespace App\Repositories;

use App\Eloquents\GatherPlaceGatherItem;
use App\Repositories\Interfaces\GatherPlaceGatherItemRepositoryInterface;

/**
 * 採取場所と採取アイテムを紐付けるデータのリポジトリ
 * Class GatherItemRepository
 * @package App\Repositories
 */
class GatherPlaceGatherItemRepository implements GatherPlaceGatherItemRepositoryInterface
{
    /**
     * レコードの作成もしくは更新
     *
     * @param GatherPlaceGatherItem $gatherPlaceGatherItem
     * @return bool
     */
    public function save(GatherPlaceGatherItem $gatherPlaceGatherItem)
    {
        return $gatherPlaceGatherItem->save();
    }
}
