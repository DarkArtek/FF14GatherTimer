<?php

namespace App\Eloquents;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * エリア
 * Class Area
 * @package App\Eloquents
 */
class Area extends Model
{
    use SoftDeletes;

    /**
     * @var array 日付へキャストする属性
     */
    protected $dates = ['deleted_at'];

    /**
     * @var string テーブル名
     */
    protected $table = 'area_master';

    /**
     * @var array 編集可能なカラム
     */
    protected $fillable = ['name', 'region_id', 'patch', 'map', 'is_show'];

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

    /**
     * 採取場所を論理削除含め取得
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function gatherPlacesWithTrashed()
    {
        return $this->hasMany(GatherPlace::class)->withTrashed();
    }

    /**
     * 地図の取得(map)
     * @param $value
     * @return string
     */
    public function getMapAttribute($value)
    {
        return asset('storage/images/map/' . $value);
    }
}
