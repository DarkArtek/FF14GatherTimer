<?php

namespace App\Eloquents;

use Illuminate\Database\Eloquent\Model;

/**
 * クラス
 * Class ClassData
 * @package App\Eloquents
 */
class ClassData extends Model
{
    /**
     * @var string テーブル名
     */
    protected $table = 'class_master';

    /**
     * @var array 編集可能なカラム
     */
    protected $fillable = ['name'];

    /**
     *  採取場所を取得
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function gatherPlaces()
    {
        return $this->hasMany(GatherPlace::class);
    }
}
