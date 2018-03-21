<?php

namespace App\Http\Resources\v1;

use Illuminate\Http\Resources\Json\Resource;

class AreaResource extends Resource
{
    /**
     * リソースを配列へ変換する
     *
     * @param  \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name
        ];
    }
}
