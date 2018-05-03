<?php

namespace App\Eloquents;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * リージョン
 * Class Region
 * @package App\Eloquents
 */
class Region extends Model
{
    use SoftDeletes;

    /**
     * @var array 日付へキャストする属性
     */
    protected $dates = ['deleted_at'];

    /**
     * @var string テーブル名
     */
    protected $table = 'region_master';

    /**
     * @var array 編集可能なカラム
     */
    protected $fillable = ['name', 'is_show'];

    /**
     * エリアを取得
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function areas()
    {
        return $this->hasMany(Area::class);
    }
    /**
     * エリアを取得
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function areasWithTrashed()
    {
        return $this->hasMany(Area::class)->withTrashed();
    }
    /**
     * 採取場所を取得
     * @return \Illuminate\Database\Eloquent\Relations\HasManyThrough
     */
    public function gatherPlaces()
    {
        return $this->hasManyThrough(GatherPlace::class, Area::class);
    }
}
