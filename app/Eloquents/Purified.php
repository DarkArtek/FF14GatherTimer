<?php

namespace App\Eloquents;

use Illuminate\Database\Eloquent\Model;

/**
 * 精選アイテム
 * Class Purified
 * @package App\Eloquents
 */
class Purified extends Model
{
    /**
     * @var string テーブル名
     */
    protected $table = 'purified_master';

    /**
     * @var array 編集可能なカラム
     */
    protected $fillable = ['name'];
}
