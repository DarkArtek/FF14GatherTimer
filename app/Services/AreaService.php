<?php

namespace App\Services;

use App\Eloquents\Area;
use App\Http\Requests\AreaStoreRequest;
use App\Repositories\GatherItemRepository;
use App\Repositories\Interfaces\AreaRepositoryInterface;
use App\Repositories\Interfaces\GatherItemRepositoryInterface;
use App\Repositories\Interfaces\GatherPlaceGatherItemRepositoryInterface;
use App\Repositories\Interfaces\GatherPlaceRepositoryInterface;
use Illuminate\Support\Facades\DB;

/**
 * エリアサービス
 *
 * Class AreaService
 * @package App\Services
 */
class AreaService
{
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

    public function __construct(
        AreaRepositoryInterface $areaRepository,
        GatherPlaceGatherItemRepositoryInterface $gatherPlaceGatherItemRepository,
        GatherPlaceRepositoryInterface $gatherPlaceRepository,
        GatherItemRepository $gatherItemRepository
    ) {
        $this->areaRepository = $areaRepository;
        $this->gatherPlaceGatherItemRepository = $gatherPlaceGatherItemRepository;
        $this->gatherPlaceRepository = $gatherPlaceRepository;
        $this->gatherItemRepository = $gatherItemRepository;
    }

    /**
     * 全てのエリアを取得
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function findAll()
    {
        return $this->areaRepository->findAll();
    }

    /**
     * 採取場所が登録されているエリアを取得
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function findExistsGatherPlace()
    {
        return $this->areaRepository->findExistsGatherPlace();
    }

    /**
     * Idからエリアを取得
     *
     * @param $areaId int
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function findOrNullById($areaId)
    {
        return $this->areaRepository->findOrNullById($areaId);
    }

    /**
     * エリアの生成
     *
     * @param  AreaStoreRequest $request
     * @return mixed
     * @throws \Exception
     * @throws \Throwable
     */
    public function store(AreaStoreRequest $request)
    {
        return DB::transaction(function () use ($request) {
            $area = new Area();
            $this->areaRepository->save(
                $area->fill($request->all())
            );
            return $area;
        });
    }

    /**
     * エリアの削除
     *
     * @param Area $area
     * @throws \Exception
     * @throws \Throwable
     */
    public function delete(Area $area): void
    {
        DB::transaction(function () use ($area) {
            // エリアIDから採取場所ID取得
            $gatherPlaces = $this->gatherPlaceRepository->findByAreaIds([$area->id]);
            $gatherPlaceIds = $gatherPlaces->pluck('id')->all();

            // 採取場所IDから採取アイテムのID取得(中間テーブルより取得)
            $gatherPlaceItems = $this->gatherPlaceGatherItemRepository->findByGatherPlaceIds($gatherPlaceIds);
            $gatherItemIds = $gatherPlaceItems->pluck('gather_item_id')->all();

            // 削除
            $this->gatherItemRepository->deleteByIds($gatherItemIds);
            $this->gatherPlaceRepository->deleteByIds($gatherPlaceIds);
            $this->gatherPlaceGatherItemRepository->deleteByIds($gatherPlaceItems->pluck('id')->all());
            $this->areaRepository->delete($area);
        });
    }
}
