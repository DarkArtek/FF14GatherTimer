<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\v1\PurifiedResource;
use App\Services\PurifiedService;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * 精選アイテムコントローラ
 * Class PurifiedController
 * @package App\Http\Controllers\Api\v1
 */
class PurifiedController extends Controller
{

    private $purifiedService;

    /**
     * PurifiedController constructor.
     * @param PurifiedService $purifiedService
     */
    public function __construct(
        PurifiedService $purifiedService
    )
    {
        $this->purifiedService = $purifiedService;
    }

    /**
     * /purifiedのgetアクセス
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        return PurifiedResource::collection($this->purifiedService->findAll());
    }

    /**
     * /purified/{id}のgetアクセス
     *
     * @param int $purifiedId
     * @return PurifiedResource
     */
    public function show($purifiedId)
    {
        $data = $this->purifiedService->findOrNullById($purifiedId);
        if(null === $data){
            throw new NotFoundHttpException();
        }

        return new PurifiedResource($data);
    }
}
