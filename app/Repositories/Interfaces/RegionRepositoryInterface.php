<?php

namespace App\Repositories\Interfaces;

use App\Eloquents\Region;

interface RegionRepositoryInterface
{
    /**
     * 全てのリージョンを取得
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function findAll();

    /**
     * 表示対象のリージョンおよびエリアを取得
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function findIsShow();

    /**
     * 採取場所が登録されているリージョンを取得
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function findExistsGatherPlace();

    /**
     * Idからリージョンを取得
     *
     * @param $regiionId int
     * @return null|\Illuminate\Database\Eloquent\Model
     */
    public function findOrNullById($regiionId);

    /**
     * 指定した名前のリージョンが存在するか
     *
     * @param $name string
     * @return bool
     */
    public function nameExists($name);

    /**
     * レコードの作成もしくは更新
     *
     * @param Region $region
     * @return bool
     */
    public function save(Region $region);
}
