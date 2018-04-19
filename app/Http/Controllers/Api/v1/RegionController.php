<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
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
        return RegionResource::collection($this->regionService->findExistsGatherPlace());
    }

    /**
     * /edit/{id}のgetアクセス
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
}
