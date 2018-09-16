<?php

namespace App\Repositories\Interfaces;

use App\Eloquents\GatherPlace;

interface GatherPlaceRepositoryInterface
{
    /**
     * 全ての採取場所を取得
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function findAll();

    /**
     * Idから採取場所を取得
     *
     * @param $gatherPlaceId int
     * @return null|\Illuminate\Database\Eloquent\Model
     */
    public function findorNullById($gatherPlaceId);

    /**
     * Idから採取場所を取得
     * @param array $areaIds
     * @return $this|GatherPlace
     */
    public function findByAreaIds(array $areaIds);

    /**
     * レコードの作成もしくは更新
     *
     * @param GatherPlace $gatherPlace
     * @return bool
     */
    public function save(GatherPlace $gatherPlace);

    /**
     * レコードの削除
     *
     * @param GatherPlace $gatherPlace
     * @return bool
     * @throws \Exception
     */
    public function delete(GatherPlace $gatherPlace);

    /**
     * プライマリIDからレコードの削除
     *
     * @param array $gatherPlaceIds
     * @return bool
     */
    public function deleteByIds(array $gatherPlaceIds);
}
