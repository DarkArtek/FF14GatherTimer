<?php

namespace App\Http\Controllers\Api\v1;

use App\Eloquents\Region;
use App\Http\Controllers\Controller;
use App\Http\Requests\RegionStoreRequest;
use App\Http\Resources\v1\RegionResource;
use App\Services\RegionService;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * リージョンコントローラ
 * Class RegionController
 * @package App\Http\Controllers\Api\v1
 */
class RegionController extends Controller
{

    private $regionService;

    /**
     * RegionController constructor.
     * @param RegionService $regionService
     */
    public function __construct(
        RegionService $regionService
    ) {
        $this->regionService = $regionService;
    }

    /**
     * /regionのgetアクセス
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        return RegionResource::collection($this->regionService->findIsShow());
    }

    /**
     * /region/{id}のgetアクセス
     *
     * @param int $regionId
     * @return RegionResource
     */
    public function show($regionId)
    {
        $data = $this->regionService->findOrNullById($regionId);
        if (null === $data) {
            throw new NotFoundHttpException();
        }

        return new RegionResource($data);
    }

    /**
     * /regionのPOSTアクセス
     * @param RegionStoreRequest $request
     * @return RegionResource
     * @throws \Exception
     * @throws \Throwable
     */
    public function store(RegionStoreRequest $request)
    {
        return new RegionResource(
            $this->regionService->store($request)
        );
    }

    /**
     * /regionのDELETEアクセス
     * @param Region $region
     * @throws \Exception
     * @throws \Throwable
     */
    public function destroy(Region $region): void
    {
        $this->regionService->delete($region);
    }
}
