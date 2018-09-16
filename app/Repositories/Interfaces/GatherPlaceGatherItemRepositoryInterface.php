<?php

namespace App\Repositories\Interfaces;

use App\Eloquents\GatherPlaceGatherItem;

interface GatherPlaceGatherItemRepositoryInterface
{
    /**
     * 採取場所IDから取得
     * @param $gatherPlaceIds
     * @return GatherPlaceGatherItem
     */
    public function findByGatherPlaceIds($gatherPlaceIds);

    /**
     * レコードの作成もしくは更新
     *
     * @param GatherPlaceGatherItem $gatherPlaceGatherItem
     * @return bool
     */
    public function save(GatherPlaceGatherItem $gatherPlaceGatherItem);

    /**
     * primaryIdからレコードの削除
     *
     * @param array $gatherPlaceGatherItemIds
     * @return bool
     */
    public function deleteByIds(array $gatherPlaceGatherItemIds);
}
