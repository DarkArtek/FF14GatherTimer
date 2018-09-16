<?php

namespace App\Http\Resources\v1\Master;

use Illuminate\Http\Resources\Json\Resource;

/**
 * エリアリソース
 *
 * Class AreaResource
 * @package App\Http\Resources\v1
 */
class MasterAreaResource extends Resource
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
            'region_id' => $this->region_id,
            'patch' => $this->patch,
            'map' => $this->map,
            'is_show' => $this->is_show,
            'deleted_at' => $this->deleted_at,
            'gather_places' => MasterGatherPlaceResource::collection($this->gatherPlacesWithTrashed),
        ];
    }
}
