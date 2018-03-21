<?php

namespace App\Eloquents;

use Illuminate\Database\Eloquent\Model;

/**
 * リージョン
 * Class Region
 * @package App\Eloquents
 */
class Region extends Model
{
    /**
     * @var string テーブル名
     */
    protected $table = 'region_master';

    /**
     * @var array 編集可能なカラム
     */
    protected $fillable = ['name'];

    /**
     * エリアを取得
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function areas()
    {
        return $this->hasMany(Area::class);
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
