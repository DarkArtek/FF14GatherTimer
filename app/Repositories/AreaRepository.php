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
     * リージョンIdからエリアを取得
     * @param int $regionId
     * @return $this|\Illuminate\Database\Eloquent\Model|null
     */
    public function findByRegionId($regionId)
    {
        return $this->area->where('region_id', $regionId);
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
     * レコードの削除
     *
     * @param Area $area
     * @return bool
     * @throws \Exception
     */
    public function delete(Area $area)
    {
        return $area->delete();
    }

    /**
     * プライマリIDからレコードの削除
     *
     * @param array $areaIds
     * @return bool
     */
    public function deleteByIds(array $areaIds)
    {
        return Area::destroy($areaIds);
    }
}
