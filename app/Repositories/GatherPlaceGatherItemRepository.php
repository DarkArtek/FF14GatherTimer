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
     * @var GatherPlaceGatherItem
     */
    private $gatherPlaceGatherItem;

    /**
     * AreaRepository constructor.
     * @param GatherPlaceGatherItem $gatherPlaceGatherItem
     */
    public function __construct(GatherPlaceGatherItem $gatherPlaceGatherItem)
    {
        $this->gatherPlaceGatherItem = $gatherPlaceGatherItem;
    }

    /**
     * 採取場所IDから取得
     * @param $gatherPlaceIds
     * @return GatherPlaceGatherItem
     */
    public function findByGatherPlaceIds($gatherPlaceIds)
    {
        return $this->gatherPlaceGatherItem->whereIn('gather_place_id', $gatherPlaceIds);
    }

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

    /**
     * primaryIdからレコードの削除
     *
     * @param array $gatherPlaceGatherItemIds
     * @return bool
     */
    public function deleteByIds(array $gatherPlaceGatherItemIds): bool
    {
        return GatherPlaceGatherItem::destroy($gatherPlaceGatherItemIds);
    }
}
