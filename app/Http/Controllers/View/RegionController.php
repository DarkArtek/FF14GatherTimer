<?php

namespace App\Http\Controllers\View;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegionStoreRequest;
use App\Services\RegionService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Request;

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
    )
    {
        $this->regionService = $regionService;
    }

    /**
     * /regionのPOSTアクセス
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \App\Exceptions\ConflictException
     */
    public function store(RegionStoreRequest $request)
    {
        $this->regionService->store($request);
        return redirect()->back()->with([
            'status' => 'success',
            'message' => 'リージョンの更新に成功しました',
        ]);
    }
}
