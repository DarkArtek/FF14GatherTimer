<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\v1\ClassResource;
use App\Services\ClassService;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * クラスコントローラ
 * Class ClassController
 * @package App\Http\Controllers\Api\v1
 */
class ClassController extends Controller
{

    private $classService;

    /**
     * ClassController constructor.
     * @param ClassService $classService
     */
    public function __construct(
        ClassService $classService
    )
    {
        $this->classService = $classService;
    }

    /**
     * /classのgetアクセス
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        return ClassResource::collection($this->classService->findAll());
    }

    /**
     * /class/{id}のgetアクセス
     *
     * @param $id
     * @return ClassResource
     */
    public function show($id)
    {
        $data = $this->classService->findOrNullById($id);
        if(null === $data){
            throw new NotFoundHttpException();
        }

        return new ClassResource($data);
    }
}
