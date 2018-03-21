<?php

namespace App\Eloquents;

use Illuminate\Database\Eloquent\Model;

/**
 * 採取時間
 * Class GatherTime
 * @package App\Eloquents
 */
class Shelf extends Model
{
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
