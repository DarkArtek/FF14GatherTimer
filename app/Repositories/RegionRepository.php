<?php

namespace App\Repositories;

use App\Eloquents\Region;
use App\Http\Requests\RegionStoreRequest;
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
        return $this->region::with('areas')->get();
    }

    /**
     * 全ての情報を取得
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function findAllInfo()
    {
        return $this->region->withTrashed()
            ->with([
            'areasWithTrashed',
            'areasWithTrashed.gatherPlacesWithTrashed',
            'areasWithTrashed.gatherPlacesWithTrashed.gatherItemsWithTrashed',
            'areasWithTrashed.gatherPlacesWithTrashed.gatherItemsWithTrashed.purifiedItemsWithTrashed'
            ])->get();
    }

    /**
     * 表示対象のリージョンおよびエリアを取得
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function findIsShow()
    {
        return $this->region::with(['areas' => function ($query) {
            $query->where('is_show', true);
        },'areas.gatherPlaces','areas.gatherPlaces.gatherItems'])->where('is_show', true)->get();
    }

    /**
     * 採取場所が登録されているリージョンを取得
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function findExistsGatherPlace()
    {
        return $this->region::has('gatherPlaces')->with('areas')->get();
    }

    /**
     * Idからリージョンを取得
     *
     * @param $regiionId int
     * @return null|Region
     */
    public function findOrNullById($regiionId)
    {
        return $this->region->find($regiionId);
    }

    /**
     * 指定した名前のリージョンが存在するか
     *
     * @param $name string
     * @return bool
     */
    public function nameExists($name)
    {
        return $this->region->where('name', $name)->exists();
    }

    /**
     * レコードの作成もしくは更新
     *
     * @param Region $region
     * @return bool
     */
    public function save(Region $region)
    {
        return $region->save();
    }

    /**
     * レコードの作成もしくは更新
     *
     * @param Region $region
     * @return bool|null
     * @throws \Exception
     */
    public function delete(Region $region)
    {
        return $region->delete();
    }
}
