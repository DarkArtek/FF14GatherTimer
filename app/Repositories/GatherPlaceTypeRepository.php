<?php

namespace App\Repositories;

use App\Eloquents\GatherPlaceType;
use App\Repositories\Interfaces\GatherPlaceTypeRepositoryInterface;

/**
 * 採取場所種類(伝説｜未知|刻限)リポジトリ
 * Class GatherPlaceTypeRepository
 * @package App\Repositories
 */
class GatherPlaceTypeRepository implements GatherPlaceTypeRepositoryInterface
{
    protected $gatherPlaceType;

    /**
     * GatherPlaceTypeRepository constructor.
     * @param GatherPlaceType $gatherPlaceType
     */
    public function __construct(GatherPlaceType $gatherPlaceType)
    {
        $this->gatherPlaceType = $gatherPlaceType;
    }

    /**
     * 全てのタイプを取得
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function findAll()
    {
        return $this->gatherPlaceType::all();
    }

    /**
     * 採取場所が登録されているタイプを取得
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function findExistsGatherPlace()
    {
        return $this->gatherPlaceType::has('gatherPlaces')->get();
    }

    /**
     * Idからタイプを取得
     *
     * @param $gatherPlaceTypeId int
     * @return null|\Illuminate\Database\Eloquent\Model
     */
    public function findOrNullById($gatherPlaceTypeId)
    {
        return $this->gatherPlaceType->find($gatherPlaceTypeId);
    }

    /**
     * レコードの作成もしくは更新
     *
     * @param GatherPlaceType $gatherPlaceType
     * @return bool
     */
    public function save(GatherPlaceType $gatherPlaceType)
    {
        return $gatherPlaceType->save();
    }

    /**
     * レコードの作成もしくは更新
     *
     * @param GatherPlaceType $gatherPlaceType
     * @return bool
     */
    public function save(GatherPlaceType $gatherPlaceType)
    {
        return $gatherPlaceType->save();
    }
}
