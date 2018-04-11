<?php

namespace App\Repositories;

use App\Eloquents\Region;
use App\Repositories\Interfaces\RegionRepositoryInterface;

/**
 * リージョンリポジトリ
 * Class RegionRepository
 * @package App\Repositories
 */
class RegionRepository implements RegionRepositoryInterface
{
    protected $region;

    /**
     * RegionRepository constructor.
     * @param Region $region
     */
    public function __construct(Region $region)
    {
        $this->region = $region;
    }

    /**
     * 全てのリージョンを取得
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function findAll()
    {
        return $this->region::all();
    }

    /**
     * 採取場所が登録されているリージョンを取得
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function findExistsGatherPlace()
    {
        return $this->region::has('gatherPlaces')->get();
    }

    /**
     * Idからリージョンを取得
     *
     * @param $id int
     * @return null|\Illuminate\Database\Eloquent\Model
     */
    public function findOrNullById($id)
    {
        return $this->region->find($id);
    }
}
