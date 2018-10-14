<?php

namespace App\Services;

use App\Eloquents\Region;
use App\Http\Requests\RegionDestroyRequest;
use App\Http\Requests\RegionStoreRequest;
use App\Http\Requests\RegionUpdateRequest;
use App\Repositories\GatherItemRepository;
use App\Repositories\Interfaces\AreaRepositoryInterface;
use App\Repositories\Interfaces\GatherPlaceGatherItemRepositoryInterface;
use App\Repositories\Interfaces\GatherPlaceRepositoryInterface;
use App\Repositories\Interfaces\RegionRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

/**
 * リージョンサービス
 * Class RegionService
 * @package App\Services
 */
class RegionService
{
    /**
     * @var RegionRepositoryInterface
     */
    protected $regionRepository;
    /**
     * @var AreaRepositoryInterface
     */
    private $areaRepository;
    /**
     * @var GatherPlaceGatherItemRepositoryInterface
     */
    private $gatherPlaceGatherItemRepository;
    /**
     * @var GatherPlaceRepositoryInterface
     */
    private $gatherPlaceRepository;
    /**
     * @var GatherItemRepository
     */
    private $gatherItemRepository;

    /**
     * RegionService constructor.
     * @param RegionRepositoryInterface $regionRepository
     * @param AreaRepositoryInterface $areaRepository
     * @param GatherPlaceGatherItemRepositoryInterface $gatherPlaceGatherItemRepository
     * @param GatherPlaceRepositoryInterface $gatherPlaceRepository
     * @param GatherItemRepository $gatherItemRepository
     */
    public function __construct(
        RegionRepositoryInterface $regionRepository,
        AreaRepositoryInterface $areaRepository,
        GatherPlaceGatherItemRepositoryInterface $gatherPlaceGatherItemRepository,
        GatherPlaceRepositoryInterface $gatherPlaceRepository,
        GatherItemRepository $gatherItemRepository
    ) {
        $this->regionRepository = $regionRepository;
        $this->areaRepository = $areaRepository;
        $this->gatherPlaceGatherItemRepository = $gatherPlaceGatherItemRepository;
        $this->gatherPlaceRepository = $gatherPlaceRepository;
        $this->gatherItemRepository = $gatherItemRepository;
    }

    /**
     * 全てのリージョンを取得
     *
     * @return Collection
     */
    public function findAll(): Collection
    {
        return $this->regionRepository->findAll();
    }

    /**
     * 全ての情報を取得
     *
     * @return Collection
     */
    public function findAllInfo(): Collection
    {
        return $this->regionRepository->findAllInfo();
    }

    /**
     * 表示対象のリージョンおよびエリアを取得
     *
     * @return Collection
     */
    public function findIsShow(): Collection
    {
        return $this->regionRepository->findIsShow();
    }

    /**
     * 採取場所が登録されているリージョンを取得
     *
     * @return Collection
     */
    public function findExistsGatherPlace(): Collection
    {
        return $this->regionRepository->findExistsGatherPlace();
    }

    /**
     * Idからリージョンを取得
     *
     * @param $regionId int
     * @return null|Model
     */
    public function findOrNullById($regionId): ?Model
    {
        return $this->regionRepository->findOrNullById($regionId);
    }

    /**
     * リージョンの生成
     *
     * @param  RegionStoreRequest $request
     * @return mixed
     * @throws \Exception
     * @throws \Throwable
     */
    public function store(RegionStoreRequest $request)
    {
        return DB::transaction(function () use ($request) {
            $region = new Region();
            $region->fill($request->all());
            $this->regionRepository->save(
                $region
            );
            return $region;
        });
    }

    /**
     * リージョンの更新
     * @param RegionUpdateRequest $request
     * @return mixed
     * @throws \Exception
     * @throws \Throwable
     */
    public function update(RegionUpdateRequest $request)
    {
        return DB::transaction(function () use ($request) {
            $region = $this->regionRepository->findOrNullById($request::get('id'));
            $this->regionRepository->save(
                $region->fill($request::all())
            );
            return $region;
        });
    }

    /**
     * リージョンの削除
     *
     * @param Region $region
     * @throws \Exception
     * @throws \Throwable
     */
    public function delete(Region $region): void
    {
        DB::transaction(function () use ($region) {
            // リージョンIDからエリアID取得
            $areas = $this->areaRepository->findByRegionId($region->id);
            $areaIds = $areas->pluck('id')->all();
            // エリアIDから採取場所ID取得
            $gatherPlaces = $this->gatherPlaceRepository->findByAreaIds($areaIds);
            $gatherPlaceIds = $gatherPlaces->pluck('id')->all();

            // 採取場所IDから採取アイテムのID取得(中間テーブルより取得)
            $gatherPlaceItems = $this->gatherPlaceGatherItemRepository->findByGatherPlaceIds($gatherPlaceIds);
            $gatherItemIds = $gatherPlaceItems->pluck('gather_item_id')->all();

            // 削除
            $this->gatherItemRepository->deleteByIds($gatherItemIds);
            $this->gatherPlaceRepository->deleteByIds($gatherPlaceIds);
            $this->gatherPlaceGatherItemRepository->deleteByIds($gatherPlaceItems->pluck('id')->all());
            $this->areaRepository->deleteByIds($areaIds);
            $this->regionRepository->delete($region);
        });
    }
}
