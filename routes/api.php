<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['prefix' => 'v1', 'middleware' => 'auth:api'], function () {
    Route::apiResource('/area', 'Api\v1\AreaController', ['only' => ['index', 'show']]);
    Route::apiResource('/region', 'Api\v1\RegionController', ['only' => ['index', 'show']]);
    Route::apiResource('/gatherPlaceType', 'Api\v1\gatherPlaceTypeController', ['only' => ['index', 'show']]);
    Route::apiResource('/class', 'Api\v1\ClassController', ['only' => ['index', 'show']]);
    Route::apiResource('/purified', 'Api\v1\PurifiedController', ['only' => ['index', 'show']]);
    Route::apiResource('/gatherTime/item', 'Api\v1\GatherTimeItemController', ['only' => ['index', 'show']]);
    Route::apiResource('/gatherTime', 'Api\v1\GatherTimeController', ['only' => ['index', 'show']]);

    Route::get('/user', function (Request $request) {
        return $request->user();
    });
});