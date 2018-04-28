<?php

namespace App\Eloquents;

use Illuminate\Database\Eloquent\Model;

/**
 * 採取アイテム
 * Class GatherItem
 * @package App\Eloquents
 */
class GatherItem extends Model
{
    /**
     * @var string テーブル名
     */
    protected $table = 'gather_item';

    /**
     * @var array 編集可能なカラム
     */
    protected $fillable = [
        'name',
        'level',
        'star',
        'limit',
        'patch',
        'memo',
        'icon',
    ];

    /**
     * 採取場所を取得
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function gatherPlaces()
    {
        return $this->belongsToMany(GatherPlace::class, 'gather_place_gather_item')->withPivot('shelf_id');
    }

    /**
     * 精選アイテムを取得
     * @return \Illuminate\Database\Eloquent\Relations\belongsToMany
     */
    public function purifiedItems()
    {
        return $this->belongsToMany(Purified::class);
    }

    /**
     * アイコンのパスを取得
     *
     * @param  string $value
     * @return string
     */
    public function getIconAttribute($value): string
    {
        return asset('storage/images/item/' . $value);
    }
}
