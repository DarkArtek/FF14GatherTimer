<?php

namespace App\Eloquents;

use Illuminate\Database\Eloquent\Model;

/**
 * 採取場所に紐づく採取アイテム
 * Class GatherItem
 * @package App\Eloquents
 */
class GatherPlaceGatherItem extends Model
{
    /**
     * @var string テーブル名
     */
    protected $table = 'gather_place_gather_item';

    /**
     * @var array 編集可能なカラム
     */
    protected $fillable = [
        'gather_place_id',
        'gather_item_id',
        'shelf_id',
    ];
}
