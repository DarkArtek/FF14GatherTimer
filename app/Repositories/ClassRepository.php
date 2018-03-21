<?php

namespace App\Repositories;

use App\Eloquents\ClassData;
use App\Repositories\Interfaces\ClassRepositoryInterface;

/**
 * クラスリポジトリ
 * Class ClassRepository
 * @package App\Repositories
 */
class ClassRepository implements ClassRepositoryInterface
{
    protected $class;

    /**
     * ClassRepository constructor.
     * @param ClassData $class
     */
    public function __construct(ClassData $class)
    {
        $this->class = $class;
    }

    /**
     * 全てのクラスを取得
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function findAll()
    {
        return $this->class::all();
    }

    /**
     * Idからクラスを取得
     *
     * @param $classId int
     * @return null|\Illuminate\Database\Eloquent\Model
     */
    public function findOrNullById($classId)
    {
        return $this->class->find($classId);
    }

    /**
     * レコードの作成もしくは更新
     *
     * @param ClassData $class
     * @return bool
     */
    public function save(ClassData $class)
    {
        return $class->save();
    }

    /**
     * レコードの作成もしくは更新
     *
     * @param ClassData $class
     * @return bool
     */
    public function save(ClassData $class)
    {
        return $class->save();
    }
}
