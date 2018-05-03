<?php

namespace App\Http\Controllers\View;

use App\Http\Controllers\Controller;

/**
 * 編集コントローラ
 * Class RegionController
 * @package App\Http\Controllers\Api\v1
 */
class EditController extends Controller
{
    /**
     * /editのGETアクセス
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('edit.index');
    }
}
