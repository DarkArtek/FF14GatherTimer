<?php

namespace App\Http\Controllers\View;

use App\Http\Controllers\Controller;
use App\Services\RegionService;
use Illuminate\Support\Collection;

/**
 * 編集コントローラ
 * Class RegionController
 * @package App\Http\Controllers\Api\v1
 */
class EditController extends Controller
{

    private $regionService;

    /**
     * RegionController constructor.
     * @param RegionService $regionService
     */
    public function __construct(
        RegionService $regionService
    ) {
        $this->regionService = $regionService;
    }

    /**
     * /editのGETアクセス
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view(
            'edit.index',
            [
                'regions' => $this->regionService->findIsShow(),
                'status' => 'success',
                'message' => '',
            ]
        );
    }
}
