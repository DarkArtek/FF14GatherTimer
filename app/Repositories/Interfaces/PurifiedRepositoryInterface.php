<?php
namespace App\Repositories\Interfaces;

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
     * @param $id int
     * @return null|\Illuminate\Database\Eloquent\Model
     */
    public function findOrNullById($id);
}
