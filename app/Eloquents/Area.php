<?php

namespace App\Eloquents;

use Illuminate\Database\Eloquent\Model;

/**
 * エリア
 * Class Area
 * @package App\Eloquents
 */
class Area extends Model
{
    /**
     * @var string テーブル名
     */
    protected $table = 'area_master';

    /**
     * @var array 編集可能なカラム
     */
    protected $fillable = ['name', 'region_id', 'patch', 'map'];

    /**
     * リージョンを取得
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function region()
    {
        return $this->belongsTo(Region::class);
    }

    /**
     * 採取場所を取得
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function gatherPlaces()
    {
        return $this->hasMany(GatherPlace::class);
    }
}
