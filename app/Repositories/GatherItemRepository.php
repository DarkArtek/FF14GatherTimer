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
    protected $gatherItem;

    /**
     * GatherItemRepository constructor.
     * @param GatherItem $gatherItem
     */
    public function __construct(GatherItem $gatherItem)
    {
        $this->gatherItem = $gatherItem;
    }

    /**
     * /**
     * 全ての採取アイテムを取得
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function findAll()
    {
        return $this->gatherItem::all();
    }

    /**
     * Idから採取アイテムを取得
     *
     * @param $gatherItemId int
     * @return null|\Illuminate\Database\Eloquent\Model
     */
    public function findOrNullById($gatherItemId)
    {
        return $this->gatherItem->find($gatherItemId);
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
}
