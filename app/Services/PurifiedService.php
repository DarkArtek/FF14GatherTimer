<?php
namespace App\Services;

use App\Repositories\Interfaces\PurifiedRepositoryInterface;

/**
 * 精選アイテムサービス
 * Class PurifiedService
 * @package App\Services
 */
class PurifiedService
{
    protected $purifiedRepository;

    /**
     * PurifiedService constructor.
     * @param PurifiedRepositoryInterface $purifiedRepository
     */
    public function __construct(
        PurifiedRepositoryInterface $purifiedRepository
    ) {
        $this->purifiedRepository = $purifiedRepository;
    }

    /**
     * 全ての精選アイテムを取得
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function findAll()
    {
        return $this->purifiedRepository->findAll();
    }

    /**
     * 採取場所が登録されている精選アイテムを取得
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function findExistsGatherPlace()
    {
        return $this->purifiedRepository->findExistsGatherPlace();
    }

    /**
     * Idから精選アイテムを取得
     *
     * @param $id int
     * @return null|\Illuminate\Database\Eloquent\Model
     */
    public function findOrNullById($id)
    {
        return $this->purifiedRepository->findOrNullById($id);
    }
}
