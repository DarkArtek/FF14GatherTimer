<?php

namespace App\Http\Resources\v1;

use Illuminate\Http\Resources\Json\Resource;

/**
 * リージョンリソース
 *
 * Class RegionResource
 * @package App\Http\Resources\v1
 */
class RegionResource extends Resource
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
            'name' => $this->name
        ];
    }
}
