<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\v1\GatherTimeResource;
use App\Services\GatherTimeService;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
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
     * @param gatherTimeService $gatherTimeService
     */
    public function __construct(
        gatherTimeService $gatherTimeService
    ) {
        $this->gatherTimeService = $gatherTimeService;
    }

    /**
     * /gatherTime/item/のgetアクセス
     *
     * @return AnonymousResourceCollection
     */
    public function index(): AnonymousResourceCollection
    {
        return GatherTimeResource::collection($this->gatherTimeService->findItemTimeAll());
    }

    /**
     * /gatherTime/Item/{id}のgetアクセス
     *
     * @param  int $itemId
     * @return AnonymousResourceCollection
     * @throws \Symfony\Component\HttpKernel\Exception\NotFoundHttpException
     */
    public function show($itemId): AnonymousResourceCollection
    {
        $data = $this->gatherTimeService->findItemTimeByItemId($itemId);
        if (null === $data) {
            throw new NotFoundHttpException();
        }

        return GatherTimeResource::collection($data);
    }
}
