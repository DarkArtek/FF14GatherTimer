<?php

namespace App\Eloquents;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * 採取時間
 * Class GatherTime
 * @package App\Eloquents
 */
class GatherTime extends Model
{
    use SoftDeletes;

    /**
     * @var array 日付へキャストする属性
     */
    protected $dates = ['deleted_at'];

    /**
     * @var string テーブル名
     */
    protected $table = 'gather_time';

    /**
     * @var array 編集可能なカラム
     */
    protected $fillable = [
        'gather_place_id',
        'start_time'
    ];

    /**
     * 採取場所を取得
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function gatherPlace()
    {
        return $this->belongsTo(GatherPlace::class);
    }

    /**
     * エリアを取得
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function area()
    {
        return $this->belongsTo(Area::class);
    }

    /**
     * クラスを取得
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function class()
    {
        return $this->belongsTo(ClassData::class);
    }

    /**
     * 採取場所種類を取得
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function gatherPlaceType()
    {
        return $this->belongsTo(GatherPlaceType::class);
    }

    /**
     * 精選アイテムを取得
     * @return \Illuminate\Database\Eloquent\Relations\belongsToMany
     */
    public function gatherItems()
    {
        return $this->belongsToMany(GatherItem::class);
    }

    /**
     * すべての情報を同時に取得
     * @param $query
     * @return mixed
     */
    public function scopeWithAll($query)
    {
        $with = [
            'gatherPlace',
            'gatherPlace.class',
            'gatherPlace.gatherPlaceType',
            'gatherPlace.area',
            'gatherPlace.gatherItems',
            'gatherPlace.gatherItems.purifiedItems',
        ];
        return $query->with($with);
    }
}
