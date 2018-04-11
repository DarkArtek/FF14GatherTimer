<?php
/**
 * User: ななつき
 * Date: 2018/03/07
 * Time: 21:52
 */

namespace Tests\Feature\Api\v1;

use App\Eloquents\GatherPlace;
use App\Eloquents\Region;
use Tests\Feature\Api\ApiTestCase;

/**
 * Class RegionTest
 * @package Tests\Feature
 */
class RegionTest extends ApiTestCase
{
    /**
     * @var string
     */
    protected $uri = '/api/v1/region';

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
        $this->showId = Region::first()->id;
    }
}
