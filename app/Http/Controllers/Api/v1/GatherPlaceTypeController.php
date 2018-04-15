<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\v1\GatherPlaceTypeResource;
use App\Services\GatherPlaceTypeService;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * 採取場所種類(未知|伝説|刻限)コントローラ
 * Class GatherPlaceTypeController
 * @package App\Http\Controllers\Api\v1
 */
class GatherPlaceTypeController extends Controller
{

    private $gatherPlaceTypeService;

    /**
     * GatherPlaceTypeController constructor.
     * @param GatherPlaceTypeService $gatherPlaceTypeService
     */
    public function __construct(
        GatherPlaceTypeService $gatherPlaceTypeService
    )
    {
        $this->gatherPlaceTypeService = $gatherPlaceTypeService;
    }

    /**
     * /typeのgetアクセス
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        return GatherPlaceTypeResource::collection($this->gatherPlaceTypeService->findExistsGatherPlace());
    }

    /**
     * /type/{id}のgetアクセス
     *
     * @param int $gatherPlaceId
     * @return GatherPlaceTypeResource
     */
    public function show($gatherPlaceId)
    {
        $data = $this->gatherPlaceTypeService->findOrNullById($gatherPlaceId);
        if(null === $data){
            throw new NotFoundHttpException();
        }
        return new GatherPlaceTypeResource($data);
    }
}
