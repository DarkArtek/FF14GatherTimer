<?php

namespace App\Http\Resources\v1;

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
            'level' => $this->level,
            'star' => $this->star,
            'is_limit' => $this->is_limit,
            'patch' => $this->patch,
            'memo' => $this->memo,
            'icon' => $this->icon,
            'discernment' => $this->discernment,
            'deleted_at' => $this->deleted_at,
            'purified_items' => PurifiedResource::collection($this->purifiedItems),
        ];
    }
}
