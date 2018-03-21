<?php
namespace App\Repositories\Interfaces;

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
     * @param $id int
     * @return null|\Illuminate\Database\Eloquent\Model
     */
    public function findOrNullById($id);
}
