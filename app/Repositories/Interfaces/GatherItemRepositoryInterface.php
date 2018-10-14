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
     * @return null|GatherItem
     */
    public function findOrNullById($gatherItemId);

    /**
     * レコードの作成もしくは更新
     *
     * @param GatherItem $gatherItem
     * @return bool
     */
    public function save(GatherItem $gatherItem);


    /**
     * レコードの削除
     *
     * @param GatherItem $gatherItem
     * @return bool
     * @throws \Exception
     */
    public function delete(GatherItem $gatherItem);

    /**
     * primaryIdからレコードの削除
     *
     * @param array $gatherItemIds
     * @return bool
     */
    public function deleteByIds(array $gatherItemIds);
}
