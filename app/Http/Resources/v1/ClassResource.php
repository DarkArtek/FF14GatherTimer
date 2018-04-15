<?php

namespace App\Http\Resources\v1;

use Illuminate\Http\Resources\Json\Resource;

/**
 * クラスリソース
 *
 * Class ClassResource
 * @package App\Http\Resources\v1
 */
class ClassResource extends Resource
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
