<?php

namespace App\Http\Controllers\Api\v1;

use App\Eloquents\GatherItem;
use App\Http\Controllers\Controller;
use App\Http\Requests\GatherItemStoreRequest;
use App\Http\Requests\GatherItemUpdateRequest;
use App\Http\Resources\v1\GatherItemResource;
use App\Services\GatherItemService;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * 採取アイテムを取得するコントローラ
 * Class GatherItemController
 * @package App\Http\Controllers\Api\v1
 */
class GatherItemController extends Controller
{
    /**
     * @var GatherItemService
     */
    private $service;

    /**
     * GatherItemController constructor.
     * @param GatherItemService $service
     */
    public function __construct(
        GatherItemService $service
    ) {
        $this->service = $service;
    }

    /**
     * /gatherItemのgetアクセス
     *
     * @return AnonymousResourceCollection
     */
    public function index(): AnonymousResourceCollection
    {
        return GatherItemResource::collection($this->service->findAll());
    }

    /**
     * /gatherItem/{id}のgetアクセス
     *
     * @param int $gatherItemId
     * @return GatherItemResource
     * @throws \Symfony\Component\HttpKernel\Exception\NotFoundHttpException
     */
    public function show(int $gatherItemId): GatherItemResource
    {
        $data = $this->service->findOrNullById($gatherItemId);
        if (null === $data) {
            throw new NotFoundHttpException();
        }
        return new GatherItemResource($data);
    }

    /**
     * /gatherItemのPOSTアクセス
     * @param GatherItemStoreRequest $request
     * @return GatherItemResource
     * @throws \Exception
     * @throws \Throwable
     */
    public function store(GatherItemStoreRequest $request): GatherItemResource
    {
        return new GatherItemResource(
            $this->service->store($request)
        );
    }

    /**
     * /gatherItemのPOSTアクセス
     * @param GatherItem $gatherItem
     * @param GatherItemUpdateRequest $request
     * @return GatherItemResource
     * @throws \Exception
     * @throws \Throwable
     */
    public function update(GatherItem $gatherItem, GatherItemUpdateRequest $request): GatherItemResource
    {
        return new GatherItemResource(
            $this->service->update($gatherItem, $request)
        );
    }

    /**
     * /gatherItemのDELETEアクセス
     * @param GatherItem $gatherItem
     * @throws \Exception
     * @throws \Throwable
     */
    public function destroy(GatherItem $gatherItem): void
    {
        $this->service->delete($gatherItem);
    }
}
