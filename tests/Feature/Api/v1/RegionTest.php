<?php
/**
 * User: ななつき
 * Date: 2018/03/07
 * Time: 21:52
 */

namespace Tests\Feature\Api\v1;

use App\Eloquents\GatherPlace;
use App\Eloquents\GatherPlaceGatherItem;
use App\Eloquents\Region;
use App\User;
use Laravel\Passport\Passport;
use Tests\Feature\Api\ApiTestCase;
use Tests\Feature\Api\Traits\StoreTestTrait;

/**
 * Class RegionTest
 * @package Tests\Feature
 */
class RegionTest extends ApiTestCase
{
    use StoreTestTrait;

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
     * @var array
     */
    protected $storeData = [
        'name' => 'リージョンA'
    ];

    /**
     * データ作成
     */
    public function createTestData()
    {
        parent::createTestData();
        factory(GatherPlace::class, 10)->create();
        $this->showId = Region::first()->id;
        return Region::all();
    }

    /**
     * 異常系 nameがすでに存在する
     * postリクエスト
     */
    public function testStoreFailExistName(): void
    {
        Passport::actingAs(
            factory(User::class)->create(),
            ['create-servers']
        );
        $data = $this->createTestData();
        $response = $this->json('POST', $this->uri, ['name' => $data->first()->name]);
        $response->assertStatus(422);
    }

    /**
     * 異常系 nameが256文字以上
     * postリクエスト
     */
    public function testStoreFail256Name(): void
    {
        Passport::actingAs(
            factory(User::class)->create(),
            ['create-servers']
        );
        $response = $this->json('POST', $this->uri, ['name' => $this->makeRandStr(256)]);
        $response->assertStatus(422);
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
        $region = Region::first();
        $response = $this->json('DELETE', $this->uri . '/' . $region->id);
        $response->assertStatus(200);
    }
}
