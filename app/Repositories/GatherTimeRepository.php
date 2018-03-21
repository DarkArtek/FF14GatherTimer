<?php

namespace App\Repositories;

use App\Repositories\Interfaces\GatherTimeRepositoryInterface;
use App\Eloquents\GatherTime;

/**
 * 採取時間リポジトリ
 * Class GatherTimeRepository
 * @package App\Repositories
 */
class GatherTimeRepository implements GatherTimeRepositoryInterface
{
    protected $gatherTime;

    /**
     * アイテムごとの採取時間をすべて取得
     *
     * @return \Illuminate\Database\Eloquent\Model
     */
    private function getQueryItemTimeAll()
    {
        return $this->gatherTime->join('gather_place AS gp', 'gp.id', '=', 'gather_time.gather_place_id')
            ->join('gather_place_gather_item AS gpgi', 'gpgi.gather_place_id', '=', 'gp.id')
            ->join('shelf_master AS sm', 'gpgi.shelf_id', '=', 'sm.id')
            ->join('gather_item AS gi', 'gi.id', '=', 'gpgi.gather_item_id')
            ->withAll()
            ->select('gather_time.*', 'gi.id AS item_id', 'gi.name AS item_name', 'gi.star', 'sm.id AS shelf', 'sm.is_hidden', 'gi.is_limit');
    }

    /**
     * GatherTimeRepository constructor.
     * @param GatherTime $gatherTime
     */
    public function __construct(GatherTime $gatherTime)
    {
        $this->gatherTime = $gatherTime;
    }

    /**
     * 全ての採取時間を取得
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function findAll()
    {
        return $this->gatherTime::withAll()->get();
    }

    /**
     * 採取場所のIdから採取時間を取得
     *
     * @param $id int
     * @return null|\Illuminate\Database\Eloquent\Model
     */
    public function findByPlaceId($id)
    {
        $data = $this->gatherTime::withAll()->whereGatherPlaceId($id)->get();
        if($data->isEmpty()){
            return null;
        }
        return $data;
    }

    /**
     * アイテムごとの採取時間をすべて取得
     *
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function findItemTimeAll()
    {
        return $this->getQueryItemTimeAll()->get();
    }

    /**
     * アイテムIDからアイテムごとの採取時間をすべて取得
     *
     * @param $id int
     * @return null|\Illuminate\Database\Eloquent\Model
     */
    public function findItemTimeByItemId($id)
    {
        $data = $this->getQueryItemTimeAll()->where('gi.id', $id)->get();
        if($data->isEmpty()){
            return null;
        }
        return $data;
    }
}
