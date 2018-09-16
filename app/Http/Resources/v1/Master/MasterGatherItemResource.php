<?php

namespace App\Http\Resources\v1\Master;

use Illuminate\Http\Resources\Json\Resource;

/**
 * 採取アイテムリソース
 *
 * Class GatherItemResource
 * @package App\Http\Resources\v1
 */
class MasterGatherItemResource extends Resource
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
            'level' => $this->level,
            'star' => $this->star,
            'limit' => $this->limit,
            'patch' => $this->patch,
            'memo' => $this->memo,
            'icon' => $this->icon,
            'shelf_id' => $this->pivot->shelf_id,
            'deleted_at' => $this->deleted_at,
            'purified_items' => MasterPurifiedResource::collection($this->purifiedItemsWithTrashed),
        ];
    }
}
