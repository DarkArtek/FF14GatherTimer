<?php
/**
 * User: ななつき
 * Date: 2018/03/07
 * Time: 21:52
 */

namespace Tests\Feature\Api\v1;

use App\Eloquents\GatherItem;
use App\Eloquents\GatherPlace;
use App\Eloquents\GatherTime;
use Tests\Feature\Api\ApiTestCase;

/**
 * Class GatherTimeTest
 * @package Tests\Feature
 */
class GatherTimeItemTest extends ApiTestCase
{
    /**
     * @var string
     */
    protected $uri = '/api/v1/gatherTime/item';

    /**
     * purified_itemsはデータがない場合があるため完全一致のテストは行わない
     * @var array
     */
    protected $dataStructure =
        [
            'time_id',
            'item_id',
            'name',
            'purified_items',
            'gather_items' => [[
                'id',
                'name',
                'shelf_id',
                'purified_items',
            ]],
            'place' => ['id', 'name',],
            'class' => ['id', 'name',],
            'type' => ['id', 'name',],
            'area' => ['id', 'name',],
            'region' => ['id', 'name',],
            'level',
            'start_time',
            'elapsed_time',
            'star',
            'patch',
            'shelf',
            'is_hidden',
            'is_limit',
            'place_point',
            'free_word',
        ];

    /**
     * Showが複数返すか否か
     * @var bool
     */
    protected $isShowMultiReturn = true;

    /**
     * データ作成
     */
    public function createTestData()
    {
        parent::createTestData();
        factory(GatherTime::class, 10)->create();
        $this->showId = GatherItem::first()->id;
    }
}
