<?php
namespace App\Services;


use App\Repositories\Interfaces\ClassRepositoryInterface;

/**
 * クラスサービス
 * Class ClassService
 * @package App\Services
 */
class ClassService
{
    protected $classRepository;

    /**
     * ClassService constructor.
     * @param ClassRepositoryInterface $classRepository
     */
    public function __construct(
        ClassRepositoryInterface $classRepository
    ) {
        $this->classRepository = $classRepository;
    }

    /**
     * 全てのクラスを取得
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function findAll()
    {
        return $this->classRepository->findAll();
    }

    /**
     * Idからクラスを取得
     *
     * @param $id int
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function findOrNullById($id)
    {
        return $this->classRepository->findOrNullById($id);
    }
}
