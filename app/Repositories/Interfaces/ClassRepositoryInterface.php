<?php

namespace App\Repositories\Interfaces;

use App\Eloquents\ClassData;

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
     * @param $classId int
     * @return null|\Illuminate\Database\Eloquent\Model
     */
    public function findOrNullById($classId);

    /**
     * レコードの作成もしくは更新
     *
     * @param ClassData $class
     * @return bool
     */
    public function save(ClassData $class);
}
