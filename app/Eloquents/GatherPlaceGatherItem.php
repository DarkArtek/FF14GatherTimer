<?php

namespace App\Eloquents;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * 採取場所に紐づく採取アイテム
 * Class GatherItem
 * @package App\Eloquents
 */
class GatherPlaceGatherItem extends Model
{
    use SoftDeletes;

    /**
     * @var array 日付へキャストする属性
     */
    protected $dates = ['deleted_at'];

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
