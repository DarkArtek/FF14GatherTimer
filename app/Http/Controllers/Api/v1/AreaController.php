<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\v1\AreaResource;
use App\Services\AreaService;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * エリアコントローラ
 * Class AreaController
 * @package App\Http\Controllers\Api\v1
 */
class AreaController extends Controller
{

    private $areaService;

    /**
     * AreaController constructor.
     * @param AreaService $areaService
     */
    public function __construct(
        AreaService $areaService
    )
    {
        $this->areaService = $areaService;
    }

    /**
     * /areaのgetアクセス
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        return AreaResource::collection($this->areaService->findExistsGatherPlace());
    }

    /**
     * /area/{id}のgetアクセス
     *
     * @param int $areaId
     * @return AreaResource
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException
     */
    public function show($areaId)
    {
        $data = $this->areaService->findOrNullById($areaId);
        if(null === $data){
            throw new NotFoundHttpException();
        }

        return new AreaResource($data);
    }
}
