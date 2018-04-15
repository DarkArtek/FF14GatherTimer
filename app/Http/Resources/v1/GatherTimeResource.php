<?php

namespace App\Http\Resources\v1;

use Illuminate\Http\Resources\Json\Resource;

/**
 * 採取時間リソース
 *
 * Class GatherTimeResource
 * @package App\Http\Resources\v1
 */
class GatherTimeResource extends Resource
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
            'time_id' => $this->id,
            'item_id' => $this->item_id ?? -1,
            'name' => $this->item_name ?? $this->gatherPlace->name,
            'purified_items' => PurifiedResource::collection($this->gatherPlace->purifiedItems),
            'gather_items' =>GatherItemResource::collection($this->gatherPlace->gatherItems),
            'place' => [
                'id' => $this->gatherPlace->id,
                'name' => $this->gatherPlace->name,
            ],
            'class' => [
                'id' => $this->gatherPlace->class->id,
                'name' => $this->gatherPlace->class->name,
            ],
            'type' => [
                'id' => $this->gatherPlace->gatherPlaceType->id,
                'name' => $this->gatherPlace->gatherPlaceType->name,
            ],
            'area' => [
                'id' => $this->gatherPlace->area->id,
                'name' => $this->gatherPlace->area->name,
            ],
            'region' => [
                'id' => $this->gatherPlace->area->region->id,
                'name' => $this->gatherPlace->area->region->name,
            ],
            'level' => $this->gatherPlace->level,
            'start_time' => $this->start_time,
            'elapsed_time' => $this->gatherPlace->elapsed_time,
            'star' => $this->star ?? 0,
            'patch' => $this->gatherPlace->area->patch,
            'shelf' => $this->shelf ?? -99,
            'is_hidden' => $this->is_hidden == 1 ? true : false,
            'is_limit' => $this->is_limit == 1 ? true : false,
            'place_point' => $this->gatherPlace->place_point,
            'free_word' => '',
        ];
    }
}
