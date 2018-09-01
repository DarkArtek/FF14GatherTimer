<?php

namespace Tests\Feature\Api\Traits;

use App\User;
use Laravel\Passport\Passport;

trait StoreTestTrait
{
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

        $response = $this->json('POST', $this->uri, $this->storeData);
        $response->assertStatus(201)
            ->assertJsonStructure(['data' => $this->dataStructure]);
    }

    /**
     * 異常系 パラメータ未設定
     * postリクエスト
     */
    public function testStoreFailNoParameter(): void
    {
        Passport::actingAs(
            factory(User::class)->create(),
            ['create-servers']
        );
        $response = $this->json('POST', $this->uri);
        $response->assertStatus(422);
    }

    /**
     * 異常系
     * 非認証
     */
//    public function testStoreUnauthenticated()
//    {
//        $this->createTestData();
//        $response = $this->json('POST', $this->uri);
//        $response->assertStatus(401)
//            ->assertExactJson([
//                'message' => 'Unauthenticated.',
//            ]);
//    }
}
