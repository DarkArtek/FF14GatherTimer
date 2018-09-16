<?php

namespace App\Eloquents;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * 伝説/未知/刻限
 * Class GatherPlaceType
 * @package App\Eloquents
 */
class GatherPlaceType extends Model
{
    use SoftDeletes;

    /**
     * @var array 日付へキャストする属性
     */
    protected $dates = ['deleted_at'];

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
