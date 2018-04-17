<?php

namespace App\Repositories\Interfaces;

use App\Eloquents\GatherItem;

interface GatherItemRepositoryInterface
{
    /**
     * 全ての採取アイテムを取得
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function findAll();

    /**
     * Idから採取アイテムを取得
     *
     * @param $gatherItemId int
     * @return null|\Illuminate\Database\Eloquent\Model
     */
    public function findorNullById($gatherItemId);

    /**
     * レコードの作成もしくは更新
     *
     * @param GatherItem $gatherItem
     * @return bool
     */
    public function save(GatherItem $gatherItem);
}
