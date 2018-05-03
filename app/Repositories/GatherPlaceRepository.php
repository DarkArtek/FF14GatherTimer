<?php

namespace App\Repositories;

use App\Eloquents\GatherPlace;
use App\Repositories\Interfaces\GatherPlaceRepositoryInterface;

/**
 * 採取場所リポジトリ
 * Class GatherPlaceRepository
 * @package App\Repositories
 */
class GatherPlaceRepository implements GatherPlaceRepositoryInterface
{
    protected $gatherPlace;

    /**
     * GatherPlaceRepository constructor.
     * @param GatherPlace $gatherPlace
     */
    public function __construct(GatherPlace $gatherPlace)
    {
        $this->gatherPlace = $gatherPlace;
    }

    /**
     * /**
     * 全ての採取場所を取得
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function findAll()
    {
        return $this->gatherPlace::all();
    }

    /**
     * Idから採取場所を取得
     *
     * @param $gatherPlaceId int
     * @return null|\Illuminate\Database\Eloquent\Model
     */
    public function findOrNullById($gatherPlaceId)
    {
        return $this->gatherPlace->find($gatherPlaceId);
    }

    /**
     * Idから採取場所を取得
     * @param array $areaIds
     * @return $this|GatherPlace
     */
    public function findByAreaIds(array $areaIds)
    {
        return $this->gatherPlace->whereIn('area_id', $areaIds);
    }

    /**
     * レコードの作成もしくは更新
     *
     * @param GatherPlace $gatherPlace
     * @return bool
     */
    public function save(GatherPlace $gatherPlace)
    {
        return $gatherPlace->save();
    }

    /**
     * レコードの削除
     *
     * @param GatherPlace $gatherPlace
     * @return bool
     * @throws \Exception
     */
    public function delete(GatherPlace $gatherPlace)
    {
        return $gatherPlace->delete();
    }

    /**
     * プライマリIDからレコードの削除
     *
     * @param array $gatherPlaceIds
     * @return bool
     */
    public function deleteByIds(array $gatherPlaceIds)
    {
        return GatherPlace::destroy($gatherPlaceIds);
    }
}
