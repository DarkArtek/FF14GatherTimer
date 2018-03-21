<?php
namespace App\Repositories\Interfaces;

interface ClassRepositoryInterface
{
    /**
     * 全てのクラスを取得
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function findAll();

    /**
     * Idからクラスを取得
     *
     * @param $id int
     * @return null|\Illuminate\Database\Eloquent\Model
     */
    public function findOrNullById($id);
}
