<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\v1\GatherTimeResource;
use App\Http\Resources\v1\GatherItemTimeResource;
use App\Services\gatherTimeService;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * 採取時間コントローラ
 * Class GatherTimeController
 * @package App\Http\Controllers\Api\v1
 */
class GatherTimeController extends Controller
{

    private $gatherTimeService;

    /**
     * GatherTimeController constructor.
     * @param gatherTimeService $gatherTimeService
     */
    public function __construct(
        gatherTimeService $gatherTimeService
    ) {
        $this->gatherTimeService = $gatherTimeService;
    }

    /**
     * /gatherTime/のgetアクセス
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        return GatherTimeResource::collection($this->gatherTimeService->findPlaceTimeAll());
    }

    /**
     * /gatherTime/{id}のgetアクセス
     *
     * @param  int $gatherTimeId
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function show($gatherTimeId)
    {
        $data = $this->gatherTimeService->findPlaceTimeByPlaceId($gatherTimeId);
        if (null === $data) {
            throw new NotFoundHttpException();
        }

        return GatherTimeResource::collection($data);
    }
}
