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
     * @param $id int
     * @return null|\Illuminate\Database\Eloquent\Model
     */
    public function findOrNullById($id)
    {
        return $this->class->find($id);
    }
}
