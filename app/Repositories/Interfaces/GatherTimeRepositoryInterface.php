<?php
namespace App\Repositories\Interfaces;

use App\Eloquents\GatherTime;

interface GatherTimeRepositoryInterface
{
    /**
     * 全ての採取時間を取得
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function findAll();

    /**
     * 採取場所のIdから採取時間を取得
     *
     * @param $gatherPlaceId int
     * @return null|\Illuminate\Database\Eloquent\Model
     */
    public function findByPlaceId($gatherPlaceId);

    /**
     * アイテムごとの採取時間をすべて取得
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function findItemTimeAll();

    /**
     * アイテムIDからアイテムごとの採取時間をすべて取得
     *
     * @param $gatherItemId int
     * @return null|\Illuminate\Database\Eloquent\Model
     */
    public function findItemTimeByItemId($gatherItemId);

    /**
     * レコードの作成もしくは更新
     *
     * @param GatherTime $gatherTime
     * @return bool
     */
    public function save(GatherTime $gatherTime);
}
