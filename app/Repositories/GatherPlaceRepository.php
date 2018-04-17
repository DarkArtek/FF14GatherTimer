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
    /**
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
     * レコードの作成もしくは更新
     *
     * @param GatherPlace $gatherPlace
     * @return bool
     */
    public function save(GatherPlace $gatherPlace)
    {
        return $gatherPlace->save();
    }
}
