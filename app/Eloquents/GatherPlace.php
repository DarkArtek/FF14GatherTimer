<?php

namespace App\Eloquents;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * 採取場所
 * Class GatherPlace
 * @package App\Eloquents
 */
class GatherPlace extends Model
{
    use SoftDeletes;

    /**
     * @var array 日付へキャストする属性
     */
    protected $dates = ['deleted_at'];

    /**
     * @var string テーブル名
     */
    protected $table = 'gather_place';

    /**
     * @var array 編集可能なカラム
     */
    protected $fillable = [
        'name',
        'class_id',
        'type_id',
        'area_id',
        'level',
        'start_time1',
        'start_time2',
        'start_time3',
        'elapsed_time',
        'memo',
        'place_point',
        'map'
    ];

    /**
     * クラスを取得
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function class()
    {
        return $this->belongsTo(ClassData::class);
    }

    /**
     * 伝説/未知/刻限を取得
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function gatherPlaceType()
    {
        return $this->belongsTo(GatherPlaceType::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function area()
    {
        return $this->belongsTo(Area::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\belongsToMany
     */
    public function gatherItems()
    {
        return $this->belongsToMany(GatherItem::class, 'gather_place_gather_item')
            ->withPivot('shelf_id');
    }

    /**
     * 採取アイテムを論理削除含め取得
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function gatherItemsWithTrashed()
    {
        return $this->belongsToMany(GatherItem::class, 'gather_place_gather_item')
            ->withPivot('shelf_id')
            ->withTrashed();
    }

    /**
     * すべての精選アイテム取得
     * @return mixed
     */
    public function getPurifiedItemsAttribute()
    {
        $purifiedItems = new Collection();
        foreach ($this->gatherItems as $gatherItem) {
            $purifiedItems = $purifiedItems->concat($gatherItem->purifiedItems);
        }

        // 一度Arrayに直し、indexを振りなおす
        return collect(array_values($purifiedItems->unique('id')->all()));
    }
}
