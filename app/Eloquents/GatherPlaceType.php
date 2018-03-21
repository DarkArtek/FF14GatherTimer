<?php

namespace App\Eloquents;

use Illuminate\Database\Eloquent\Model;

/**
 * 伝説/未知/刻限
 * Class GatherPlaceType
 * @package App\Eloquents
 */
class GatherPlaceType extends Model
{
    /**
     * @var string テーブル名
     */
    protected $table = 'gather_place_type_master';
    
    /**
     * @var array 編集可能なカラム
     */
    protected $fillable = ['name'];

    /**
     * 採取場所を取得
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function gatherPlaces()
    {
        return $this->hasMany(GatherPlace::class);
    }
}
