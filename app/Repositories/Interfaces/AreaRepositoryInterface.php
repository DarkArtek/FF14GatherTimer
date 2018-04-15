<?php

namespace App\Repositories\Interfaces;

use App\Eloquents\Area;

interface AreaRepositoryInterface
{
    /**
     * 全てのエリアを取得
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function findAll();

    /**
     * 採取場所が登録されているエリアを取得
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function findExistsGatherPlace();

    /**
     * Idからエリアを取得
     *
     * @param $areaId int
     * @return null|\Illuminate\Database\Eloquent\Model
     */
    public function findorNullById($areaId);

    /**
     * レコードの作成もしくは更新
     *
     * @param Area $area
     * @return bool
     */
    public function save(Area $area);
}
