<?php

namespace App\Repositories;

use App\Eloquents\GatherItem;
use App\Repositories\Interfaces\GatherItemRepositoryInterface;

/**
 * 採取アイテムリポジトリ
 * Class GatherItemRepository
 * @package App\Repositories
 */
class GatherItemRepository implements GatherItemRepositoryInterface
{
    /**
     * /**
     * 全ての採取アイテムを取得
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function findAll()
    {
        return GatherItem::all();
    }

    /**
     * Idから採取アイテムを取得
     *
     * @param $gatherItemId int
     * @return null|\Illuminate\Database\Eloquent\Model
     */
    public function findOrNullById($gatherItemId)
    {
        return GatherItem::find($gatherItemId);
    }

    /**
     * レコードの作成もしくは更新
     *
     * @param GatherItem $gatherItem
     * @return bool
     */
    public function save(GatherItem $gatherItem)
    {
        return $gatherItem->save();
    }

    /**
     * レコードの削除
     *
     * @param GatherItem $gatherItem
     * @return bool
     * @throws \Exception
     */
    public function delete(GatherItem $gatherItem)
    {
        return $gatherItem->delete();
    }

    /**
     * primaryIdからレコードの削除
     *
     * @param array $gatherItemIds
     * @return bool
     */
    public function deleteByIds(array $gatherItemIds)
    {
        return GatherItem::destroy($gatherItemIds);
    }
}
