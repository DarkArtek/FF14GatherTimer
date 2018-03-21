<?php
/**
 * User: ななつき
 * Date: 2018/03/07
 * Time: 21:52
 */

namespace Tests\Feature\Api\v1;

use App\Eloquents\GatherPlace;
use App\Eloquents\GatherPlaceType;
use Tests\Feature\Api\ApiTestCase;

/**
 * Class GatherPlaceTypeTest
 * @package Tests\Feature
 */
class GatherPlaceTypeTest extends ApiTestCase
{
    /**
     * @var string
     */
    protected $uri = '/api/v1/gatherPlaceType';

    /**
     * @var array
     */
    protected $dataStructure = [
        'id',
        'name',
    ];

    /**
     * データ作成
     */
    public function createTestData()
    {
        parent::createTestData();
        factory(GatherPlace::class, 10)->create();
        $this->showId = GatherPlaceType::first()->id;
    }
}
