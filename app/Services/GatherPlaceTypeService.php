<?php
namespace App\Services;

use App\Repositories\Interfaces\GatherPlaceTypeRepositoryInterface;

/**
 * 採取場所種類(伝説｜未知|刻限)サービス
 * Class GatherPlaceTypeService
 * @package App\Services
 */
class GatherPlaceTypeService
{
    protected $gatherPlaceTypeRepository;

    /**
     * GatherPlaceTypeService constructor.
     * @param GatherPlaceTypeRepositoryInterface $gatherPlaceTypeRepository
     */
    public function __construct(
        GatherPlaceTypeRepositoryInterface $gatherPlaceTypeRepository
    ) {
        $this->typeRepository = $gatherPlaceTypeRepository;
    }

    /**
     * 全てのタイプを取得
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function findAll()
    {
        return $this->typeRepository->findAll();
    }

    /**
     * 採取場所が登録されているタイプを取得
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function findExistsGatherPlace()
    {
        return $this->typeRepository->findExistsGatherPlace();
    }

    /**
     * Idからタイプを取得
     *
     * @param $gatherPlaceTypeId int
     * @return null|\Illuminate\Database\Eloquent\Model
     */
    public function findOrNullById($gatherPlaceTypeId)
    {
        return $this->typeRepository->findOrNullById($gatherPlaceTypeId);
    }
}
