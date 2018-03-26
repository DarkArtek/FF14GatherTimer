<?php

namespace App\Services;

use App\Eloquents\Region;
use App\Http\Requests\RegionDestroyRequest;
use App\Http\Requests\RegionUpdateRequest;
use App\Exceptions\ConflictException;
use App\Http\Requests\RegionStoreRequest;
use App\Repositories\Interfaces\RegionRepositoryInterface;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Response;

/**
 * リージョンサービス
 * Class RegionService
 * @package App\Services
 */
class RegionService
{
    protected $regionRepository;

    /**
     * RegionService constructor.
     * @param RegionRepositoryInterface $regionRepository
     */
    public function __construct(
        RegionRepositoryInterface $regionRepository
    )
    {
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

    /**
     * リージョンの生成
     *
     * @param  RegionStoreRequest $request
     * @return Response
     * @throws ConflictException
     * @throws \Exception
     * @throws \Throwable
     */
    public function store(RegionStoreRequest $request)
    {
        if ($this->regionRepository->nameExists($request->get('name'))) {
            throw new ConflictException("すでに存在するリージョン名です");
        }

        DB::transaction(function () use ($request) {
            $region = new Region();
            $this->regionRepository->save(
                $region->fill($request->all())
            );
        });
    }

    /**
     * リージョンの更新
     * @param Request $request
     * @throws ConflictException
     * @throws \Exception
     * @throws \Throwable
     */
    public function update(Request $request)
    {
        $region = $this->regionRepository->findOrNullById($request::get('id'));
        if (null === $region) {
            throw new ConflictException("更新対象のリージョンが見つかりませんでした");
        }

        DB::transaction(function () use ($region, $request) {
            $this->regionRepository->save(
                $region->fill($request::all())
            );
        });
    }
}
