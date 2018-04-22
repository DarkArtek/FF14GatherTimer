<?php

namespace App\Services;

use App\Eloquents\Region;
use App\Http\Requests\RegionDestroyRequest;
use App\Http\Requests\RegionStoreRequest;
use App\Http\Requests\RegionUpdateRequest;
use App\Repositories\Interfaces\RegionRepositoryInterface;
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
     * RegionService constructor.
     * @param RegionRepositoryInterface $regionRepository
     */
    public function __construct(
        RegionRepositoryInterface $regionRepository
    ) {
        $this->regionRepository = $regionRepository;
    }

    /**
     * 全てのリージョンを取得
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function findAll()
    {
        return $this->regionRepository->findAll();
    }

    /**
     * 表示対象のリージョンおよびエリアを取得
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function findIsShow()
    {
        return $this->regionRepository->findIsShow();
    }

    /**
     * 採取場所が登録されているリージョンを取得
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function findExistsGatherPlace()
    {
        return $this->regionRepository->findExistsGatherPlace();
    }

    /**
     * Idからリージョンを取得
     *
     * @param $regionId int
     * @return null|\Illuminate\Database\Eloquent\Model
     */
    public function findOrNullById($regionId)
    {
        return $this->regionRepository->findOrNullById($regionId);
    }

    /**
     * リージョンの生成
     *
     * @param  RegionStoreRequest $request
     * @throws \Exception
     * @throws \Throwable
     */
    public function store(RegionStoreRequest $request)
    {
        DB::transaction(function () use ($request) {
            $region = new Region();
            $this->regionRepository->save(
                $region->fill($request->all())
            );
        });
    }

    /**
     * リージョンの更新
     * @param RegionUpdateRequest $request
     * @throws \Exception
     * @throws \Throwable
     */
    public function update(RegionUpdateRequest $request)
    {
        DB::transaction(function () use ($request) {
            $region = $this->regionRepository->findOrNullById($request::get('id'));
            $this->regionRepository->save(
                $region->fill($request::all())
            );
        });
    }

    /**
     * リージョンの生成
     *
     * @param  RegionDestroyRequest $request
     * @throws \Exception
     * @throws \Throwable
     */
    public function destroy(RegionDestroyRequest $request)
    {
        DB::transaction(function () use ($request) {
            $this->regionRepository->destroy(
                $request->all()
            );
        });
    }
}
