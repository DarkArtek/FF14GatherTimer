<?php

namespace App\Eloquents;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * 採取アイテム
 * Class GatherItem
 * @package App\Eloquents
 */
class GatherItem extends Model
{
    use SoftDeletes;

    /**
     * @var array 日付へキャストする属性
     */
    protected $dates = ['deleted_at'];

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
     * 削除済みを含む精選アイテムを取得
     * @return \Illuminate\Database\Eloquent\Relations\belongsToMany
     */
    public function purifiedItemsWithTrashed()
    {
        return $this->belongsToMany(Purified::class)->withTrashed();
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
