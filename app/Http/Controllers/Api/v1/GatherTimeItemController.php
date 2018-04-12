<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\v1\GatherTimeResource;
use App\Services\GatherTimeService;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * 採取時間コントローラ
 * Class GatherTimeController
 * @package App\Http\Controllers\Api\v1
 */
class GatherTimeItemController extends Controller
{

    private $gatherTimeService;

    /**
     * GatherTimeController constructor.
     * @param gatherTimeService $gatherTimeService
     */
    public function __construct(
        gatherTimeService $gatherTimeService
    )
    {
        $this->gatherTimeService = $gatherTimeService;
    }

    /**
     * /gatherTime/item/のgetアクセス
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function Index()
    {
        return GatherTimeResource::collection($this->gatherTimeService->findItemTimeAll());
    }

    /**
     * /gatherTime/Item/{id}のgetアクセス
     *
     * @param  int {id}
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function show($id)
    {
        $data = $this->gatherTimeService->findItemTimeByItemId($id);
        if(null === $data){
            throw new NotFoundHttpException();
        }

        return GatherTimeResource::collection($data);
    }
}
