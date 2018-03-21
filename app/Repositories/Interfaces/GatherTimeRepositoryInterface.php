<?php
namespace App\Repositories\Interfaces;

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
     * @param $id int
     * @return null|\Illuminate\Database\Eloquent\Model
     */
    public function findByPlaceId($id);

    /**
     * アイテムごとの採取時間をすべて取得
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function findItemTimeAll();

    /**
     * アイテムIDからアイテムごとの採取時間をすべて取得
     *
     * @param $id int
     * @return null|\Illuminate\Database\Eloquent\Model
     */
    public function findItemTimeByItemId($id);
}
