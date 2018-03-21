<?php

namespace App\Services;

use App\Exceptions\DataNotFoundException;
use App\Repositories\Interfaces\AreaRepositoryInterface;

/**
 * エリアサービス
 * Class AreaService
 * @package App\Services
 */
class AreaService
{
    protected $areaRepository;

    /**
     * AreaService constructor.
     * @param AreaRepositoryInterface $areaRepository
     */
    public function __construct(
        AreaRepositoryInterface $areaRepository
    ) {

        $this->areaRepository = $areaRepository;
    }

    /**
     * 全てのエリアを取得
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function findAll()
    {
        return $this->areaRepository->findAll();
    }

    /**
     * 採取場所が登録されているエリアを取得
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function findExistsGatherPlace()
    {
        return $this->areaRepository->findExistsGatherPlace();
    }

    /**
     * Idからエリアを取得
     *
     * @param $id int
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function findOrNullById($id)
    {
        return $this->areaRepository->findOrNullById($id);
    }
}
