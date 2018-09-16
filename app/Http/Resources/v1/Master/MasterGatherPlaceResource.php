<?php

namespace App\Http\Resources\v1\Master;

use Illuminate\Http\Resources\Json\Resource;

/**
 * 採取場所種類リソース
 *
 * Class GatherPlaceTypeResource
 * @package App\Http\Resources\v1
 */
class MasterGatherPlaceResource extends Resource
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
            'name' => $this->name,
            'class_id' => $this->class_id,
            'type_id' => $this->type_id,
            'area_id' => $this->area_id,
            'level' => $this->level,
            'start_time1' => $this->start_time1,
            'start_time2' => $this->start_time2,
            'start_time3' => $this->start_time3,
            'elapsed_time' => $this->elapsed_time,
            'memo' => $this->memo,
            'place_point' => $this->place_point,
            'deleted_at' => $this->deleted_at,
            'gather_items' => MasterGatherItemResource::collection($this->gatherItemsWithTrashed),
        ];
    }
}
