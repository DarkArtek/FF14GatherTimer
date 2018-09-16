<?php

namespace App\Eloquents;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * 採取アイテムに紐づく精選アイテム
 * Class GatherItem
 * @package App\Eloquents
 */
class GatherItemPurified extends Model
{
    use SoftDeletes;

    /**
     * @var array 日付へキャストする属性
     */
    protected $dates = ['deleted_at'];

    /**
     * @var string テーブル名
     */
    protected $table = 'gather_item_purified';

    /**
     * @var array 編集可能なカラム
     */
    protected $fillable = ['purified_id'];
}
