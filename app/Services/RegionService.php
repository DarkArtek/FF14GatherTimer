<?php

namespace App\Services;

use App\Repositories\Interfaces\RegionRepositoryInterface;

/**
 * リージョンサービス
 * Class RegionService
 * @package App\Services
 */
class RegionService
{
    protected $regionRepository;

    /**
     * RegionService constructor.
     * @param RegionRepositoryInterface $regionRepository
     */
    public function __construct(
        RegionRepositoryInterface $regionRepository
    )
    {
        $this->regionRepository = $regionRepository;
    }

    /**
     * 全てのリージョンを取得
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function findAll()
    {
        return $this->regionRepository->findAll();
    }

    /**
     * 採取場所が登録されているリージョンを取得
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function findExistsGatherPlace()
    {
        return $this->regionRepository->findExistsGatherPlace();
    }

    /**
     * Idからリージョンを取得
     *
     * @param $id int
     * @return null|\Illuminate\Database\Eloquent\Model
     */
    public function findOrNullById($id)
    {
        return $this->regionRepository->findOrNullById($id);
    }
}
