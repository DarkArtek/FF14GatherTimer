<?php
namespace App\Repositories;

use App\Eloquents\Area;
use App\Repositories\Interfaces\AreaRepositoryInterface;

/**
 * エリアリポジトリ
 * Class AreaRepository
 * @package App\Repositories
 */
class AreaRepository implements AreaRepositoryInterface
{
    protected $area;

    /**
     * AreaRepository constructor.
     * @param Area $area
     */
    public function __construct(Area $area)
    {
        $this->area = $area;
    }

    /**
    /**
     * 全てのエリアを取得
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function findAll()
    {
        return $this->area::all();
    }

    /**
     * 採取場所が登録されているエリアを取得
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function findExistsGatherPlace()
    {
        return $this->area::has('gatherPlaces')->get();
    }

    /**
     * Idからエリアを取得
     *
     * @param $areaId int
     * @return null|\Illuminate\Database\Eloquent\Model
     */
    public function findOrNullById($areaId)
    {
        return $this->area->find($areaId);
    }

    /**
     * レコードの作成もしくは更新
     *
     * @param Area $area
     * @return bool
     */
    public function save(Area $area)
    {
        return $area->save();
    }

    /**
     * レコードの作成もしくは更新
     *
     * @param Area $area
     * @return bool
     */
    public function save(Area $area)
    {
        return $area->save();
    }
}
