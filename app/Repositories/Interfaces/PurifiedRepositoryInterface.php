<?php

namespace App\Repositories\Interfaces;

use App\Eloquents\Purified;

interface PurifiedRepositoryInterface
{
    /**
     * 全ての精選アイテムを取得
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function findAll();

    /**
     * 採取場所が登録されている精選アイテムを取得
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function findExistsGatherPlace();

    /**
     * Idから精選アイテムを取得
     *
     * @param $purifiedId int
     * @return null|\Illuminate\Database\Eloquent\Model
     */
    public function findOrNullById($purifiedId);

    /**
     * レコードの作成もしくは更新
     *
     * @param Purified $purified
     * @return bool
     */
    public function save(Purified $purified);
}
