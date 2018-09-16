<?php

namespace App\Http\Resources\v1\Master;

use Illuminate\Http\Resources\Json\Resource;

/**
 * 精選リソース
 *
 * Class PurifiedResource
 * @package App\Http\Resources\v1
 */
class MasterPurifiedResource extends Resource
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
            'deleted_at' => $this->deleted_at,
        ];
    }
}
