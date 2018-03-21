<?php
/**
 * User: ななつき
 * Date: 2018/03/07
 * Time: 21:52
 */

namespace Tests\Feature\Api\v1;

use App\Eloquents\ClassData;
use Tests\Feature\Api\ApiTestCase;

/**
 * Class ClassTest
 * @package Tests\Feature
 */
class ClassTest extends ApiTestCase
{
    /**
     * @var string
     */
    protected $uri = '/api/v1/class';

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
        factory(ClassData::class, 10)->create();
        $this->showId = ClassData::first()->id;
    }
}
