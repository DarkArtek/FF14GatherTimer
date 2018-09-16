<?php

namespace App\Eloquents;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * 採取時間
 * Class GatherTime
 * @package App\Eloquents
 */
class Shelf extends Model
{
    use SoftDeletes;

    /**
     * @var array 日付へキャストする属性
     */
    protected $dates = ['deleted_at'];

    /**
     * @var string テーブル名
     */
    protected $table = 'shelf_master';

    /**
     * @var array 編集可能なカラム
     */
    protected $fillable = [
        'name',
    ];
}
