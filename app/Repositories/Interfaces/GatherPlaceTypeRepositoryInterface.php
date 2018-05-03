<?php

namespace App\Repositories\Interfaces;

use App\Eloquents\GatherPlaceType;

interface GatherPlaceTypeRepositoryInterface
{
    /**
     * 全てのタイプを取得
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function findAll();

    /**
     * 採取場所が登録されているタイプを取得
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function findExistsGatherPlace();

    /**
     * Idからタイプを取得
     *
     * @param $gatherPlaceTypeId int
     * @return null|\Illuminate\Database\Eloquent\Model
     */
    public function findOrNullById($gatherPlaceTypeId);

    /**
     * レコードの作成もしくは更新
     *
     * @param GatherPlaceType $gatherPlaceType
     * @return bool
     */
    public function save(GatherPlaceType $gatherPlaceType);

    /**
     * レコードの削除
     *
     * @param GatherPlaceType $gatherPlaceType
     * @return bool
     * @throws \Exception
     */
    public function delete(GatherPlaceType $gatherPlaceType);

    /**
     * プライマリIDからレコードの削除
     *
     * @param int $gatherPlaceTypeId
     * @return bool
     */
    public function deleteById(int $gatherPlaceTypeId);
}
