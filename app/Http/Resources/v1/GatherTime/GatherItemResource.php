<?php

namespace App\Http\Resources\v1\GatherTime;

use App\Http\Resources\v1\PurifiedResource;
use Illuminate\Http\Resources\Json\Resource;

/**
 * 採取アイテムリソース
 *
 * Class GatherItemResource
 * @package App\Http\Resources\v1
 */
class GatherItemResource extends Resource
{
    /**
     * リソースを配列へ変換する
     *
     * @param  \Illuminate\Http\Request $request
     * @return array
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'shelf_id' => $this->pivot->shelf_id,
            'purified_items' => PurifiedResource::collection($this->purifiedItems),
        ];
    }
}
