<?php
/**
 * User: ななつき
 * Date: 2018/03/07
 * Time: 21:52
 */

namespace Tests\Feature\Api\v1;

use App\Eloquents\GatherItem;
use App\Eloquents\GatherItemPurified;
use App\User;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Laravel\Passport\Passport;
use Tests\Feature\Api\ApiTestCase;

/**
 * Class GatherItemTest
 * @package Tests\Feature
 */
class GatherItemTest extends ApiTestCase
{
    /**
     * @var string
     */
    protected $uri = '/api/v1/gatherItem';

    /**
     * @var array
     */
    protected $dataStructure = [
        'id',
        'name',
        'level',
        'star',
        'is_limit',
        'patch',
        'memo',
        'icon',
        'purified_items',
    ];

    /**
     * データ作成
     */
    public function createTestData()
    {
        parent::createTestData();
        factory(GatherItemPurified::class, 10)->create();
        $this->showId = GatherItem::first()->id;
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
        Storage::fake('icon');
        $file = UploadedFile::fake()
            ->image('icon.jpg', 50, 50);

        $storeData = [
            'name' => '採取アイテムA',
            'star' => '1',
            'level' => 60,
            'discernment' => '120',
            'patch' => '4.0',
            'icon' => $file,
        ];

        $response = $this->json('POST', $this->uri, $storeData);

        $response
            ->assertStatus(201)
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

        $gatherItem = factory(GatherItem::class)->create();
        $response = $this->json('DELETE', $this->uri . '/' . $gatherItem->id);
        $response->assertStatus(200);
    }
}
