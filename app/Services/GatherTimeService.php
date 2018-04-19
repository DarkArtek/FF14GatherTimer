<?php
namespace App\Services;

use App\Repositories\Interfaces\GatherTimeRepositoryInterface;

/**
 * 採取時間サービス
 * Class GatherTimeService
 * @package App\Services
 */
class GatherTimeService
{
    protected $gatherTimeRepository;

    /**
     * GatherTimeService constructor.
     * @param GatherTimeRepositoryInterface $gatherTimeRepository
     */
    public function __construct(
        GatherTimeRepositoryInterface $gatherTimeRepository
    ) {
        $this->gatherTimeRepository = $gatherTimeRepository;
    }

    /**
     * 場所ごとの採取時間を取得
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function findPlaceTimeAll()
    {
        return $this->gatherTimeRepository->findAll();
    }

    /**
     * Idから採取時間を取得
     *
     * @param $gatherTimeId int
     * @return null|\Illuminate\Database\Eloquent\Model
     */
    public function findPlaceTimeByPlaceId($gatherTimeId)
    {
        return $this->gatherTimeRepository->findByPlaceId($gatherTimeId);
    }

    /**
     * 全ての採取時間をアイテムごとに取得
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function findItemTimeAll()
    {
        return $this->gatherTimeRepository->findItemTimeAll();
    }

    /**
     * 採取場所のIdから採取時間をアイテムごとに取得
     *
     * @param $gatherItemId int
     * @return null|\Illuminate\Database\Eloquent\Model
     */
    public function findItemTimeByItemId($gatherItemId)
    {
        return $this->gatherTimeRepository->findItemTimeByItemId($gatherItemId);
    }
}
