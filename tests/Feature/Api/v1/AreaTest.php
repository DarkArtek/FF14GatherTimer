<?php
/**
 * User: ななつき
 * Date: 2018/03/07
 * Time: 21:52
 */

namespace Tests\Feature\Api\v1;

use App\Eloquents\Area;
use App\Eloquents\GatherPlace;
use Tests\Feature\Api\ApiTestCase;

/**
 * Class AreaTest
 * @package Tests\Feature
 */
class AreaTest extends ApiTestCase
{
    /**
     * @var string
     */
    protected $uri = '/api/v1/area';


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
        $this->showId = Area::first()->id;
    }
}
