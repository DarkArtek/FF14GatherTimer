<?php

namespace App\Http\Resources\v1;

use Illuminate\Http\Resources\Json\Resource;

class GatherItemResource extends Resource
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
            'name' => $this->name,
            'shelf_id' => $this->pivot->shelf_id,
            'purified_items' => PurifiedResource::collection($this->purifiedItems),
        ];
    }
}
