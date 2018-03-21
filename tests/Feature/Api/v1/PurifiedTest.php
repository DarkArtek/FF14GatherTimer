<?php
/**
 * User: ななつき
 * Date: 2018/03/07
 * Time: 21:52
 */

namespace Tests\Feature\Api\v1;

use App\Eloquents\Purified;
use Tests\Feature\Api\ApiTestCase;

/**
 * Class PurifiedTest
 * @package Tests\Feature
 */
class PurifiedTest extends ApiTestCase
{
    /**
     * @var string
     */
    protected $uri = '/api/v1/purified';

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
        factory(Purified::class, 10)->create();
        $this->showId = Purified::first()->id;
    }
}
