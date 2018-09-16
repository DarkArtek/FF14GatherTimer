<?php

namespace App\Http\Controllers\Api\v1;

use App\Eloquents\Area;
use App\Http\Controllers\Controller;
use App\Http\Requests\AreaStoreRequest;
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
    /**
     * @var AreaService
     */
    private $service;

    /**
     * AreaController constructor.
     * @param AreaService $service
     */
    public function __construct(
        AreaService $service
    ) {
        $this->service = $service;
    }

    /**
     * /areaのgetアクセス
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        return AreaResource::collection($this->service->findExistsGatherPlace());
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
        $data = $this->service->findOrNullById($areaId);
        if (null === $data) {
            throw new NotFoundHttpException();
        }

        return new AreaResource($data);
    }

    /**
     * /areaのPOSTアクセス
     * @param AreaStoreRequest $request
     * @return AreaResource
     * @throws \Exception
     * @throws \Throwable
     */
    public function store(AreaStoreRequest $request)
    {
        return new AreaResource(
            $this->service->store($request)
        );
    }

    /**
     * /areaのDELETEアクセス
     * @param Area $area
     * @throws \Exception
     * @throws \Throwable
     */
    public function destroy(Area $area): void
    {
        $this->service->delete($area);
    }
}
