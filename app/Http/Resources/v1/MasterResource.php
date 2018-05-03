<?php

namespace App\Http\Resources\v1;

use App\Http\Resources\v1\Master\MasterAreaResource;
use Illuminate\Http\Resources\Json\Resource;

/**
 * マスタリソース
 *
 * Class RegionResource
 * @package App\Http\Resources\v1
 */
class MasterResource extends Resource
{
    /**
     * リソースを配列へ変換する
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'is_show' => $this->is_show,
            'deleted_at' => $this->deleted_at,
            'areas' => MasterAreaResource::collection($this->areasWithTrashed),
        ];
    }
}
