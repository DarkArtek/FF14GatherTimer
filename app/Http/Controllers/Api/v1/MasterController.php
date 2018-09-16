<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\v1\MasterResource;
use App\Http\Resources\v1\RegionResource;
use App\Services\RegionService;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * リージョンをベースにすべてのマスタを取得するコントローラ
 * Class RegionController
 * @package App\Http\Controllers\Api\v1
 */
class MasterController extends Controller
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
     * /masterのgetアクセス
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        return MasterResource::collection($this->regionService->findAllInfo());
    }

    /**
     * /master/{id}のgetアクセス
     *
     * @param int $regionId
     * @return MasterResource
     */
    public function show($regionId)
    {
        $data = $this->regionService->findOrNullById($regionId);
        if (null === $data) {
            throw new NotFoundHttpException();
        }

        return new MasterResource($data);
    }
}
