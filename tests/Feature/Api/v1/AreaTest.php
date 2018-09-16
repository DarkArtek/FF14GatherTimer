<?php
/**
 * User: ななつき
 * Date: 2018/03/07
 * Time: 21:52
 */

namespace Tests\Feature\Api\v1;

use App\Eloquents\Area;
use App\Eloquents\GatherPlace;
use App\Eloquents\GatherPlaceGatherItem;
use App\Eloquents\Region;
use App\User;
use Laravel\Passport\Passport;
use Tests\Feature\Api\ApiTestCase;
use Tests\Feature\Api\Traits\StoreTestTrait;

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
        'region_id',
        'patch',
        'map',
        'is_show',
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

    /**
     * 正常系
     * postリクエスト
     */
    public function testStoreSuccess()
    {
        Passport::actingAs(
            factory(User::class)->create(),
            ['create-servers']
        );

        parent::createTestData();
        $region = factory(Region::class)->create();

        $storeData = [
            'name' => 'エリアA',
            'region_id' => $region->id,
            'patch' => '4.0',
            'map' => 'a.png',
            'is_show' => 0,
        ];
        $response = $this->json('POST', $this->uri, $storeData);
        $response->assertStatus(201)
            ->assertJsonStructure(['data' => $this->dataStructure]);
    }

    /**
     * 正常系
     * deleteリクエスト
     */
    public function testDestroy(): void
    {
        Passport::actingAs(
            factory(User::class)->create(),
            ['create-servers']
        );

        factory(GatherPlaceGatherItem::class)->create();
        $area = Area::first();
        $response = $this->json('DELETE', $this->uri . '/' . $area->id);
        $response->assertStatus(200);
    }
}
