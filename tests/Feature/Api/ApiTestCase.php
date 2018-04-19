<?php

namespace Tests\Feature\Api;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Passport\Passport;
use Tests\BaseTestCase;

abstract class ApiTestCase extends BaseTestCase
{
    use RefreshDatabase;

    /**
     * @var string
     */
    protected $uri;

    /**
     * @var array
     */
    protected $dataStructure;

    /**
     * @var string
     */
    protected $showId;

    /**
     * Showが複数返すか否か
     * @var bool
     */
    protected $isShowMultiReturn = false;


    /**
     * データ作成
     */
    protected function createTestData()
    {
    }

    /**
     * 正常系 Structureテスト
     * getリクエスト
     */
    public function testIndexStructure()
    {
        $this->createTestData();
        Passport::actingAs(
            factory(User::class)->create(),
            ['create-servers']
        );

        $response = $this->json('GET', $this->uri);
        $response->assertJsonStructure(['data' => [$this->dataStructure]]);
    }

    /**
     * 正常系 Structureテスト
     * {id}のgetリクエスト
     */
    public function testShowStructure()
    {
        $this->createTestData();
        Passport::actingAs(
            factory(User::class)->create(),
            ['create-servers']
        );

        $response = $this->json('GET', $this->uri .'/' . $this->showId);

        if ($this->isShowMultiReturn) {
            $structure = ['data' => [$this->dataStructure]];
        } else {
            $structure = ['data' => $this->dataStructure];
        }

        $response->assertJsonStructure($structure);
    }

    /**
     * 正常系 Statusテスト
     * getリクエスト
     */
    public function testIndexSuccessStatus()
    {
        $this->createTestData();
        Passport::actingAs(
            factory(User::class)->create(),
            ['create-servers']
        );

        $response = $this->json('GET', $this->uri);
        $response->assertStatus(200);
    }

    /**
     * 正常系 Statusテスト
     * /{id}のgetリクエスト
     */
    public function testShowSuccessStatus()
    {
        $this->createTestData();
        Passport::actingAs(
            factory(User::class)->create(),
            ['create-servers']
        );

        $response = $this->json('GET', $this->uri .'/' . $this->showId);
        $response->assertStatus(200);
    }

    /**
     * 異常系
     * 非認証
     */
    public function testIndexUnauthenticated()
    {
        $this->createTestData();
        $response = $this->json('GET', $this->uri);
        $response
            ->assertStatus(401)
            ->assertExactJson([
                'message' => 'Unauthenticated.',
            ]);
    }

    /**
     * 異常系
     * 非認証
     */
    public function testShowUnauthenticated()
    {
        $this->createTestData();
        $response = $this->json('GET', $this->uri . '/' . $this->showId);
        $response
            ->assertStatus(401)
            ->assertExactJson([
                'message' => 'Unauthenticated.',
            ]);
    }

    /**
     * 異常系
     * 存在しないid
     */
    public function testShowIdNotFound()
    {
        Passport::actingAs(
            factory(User::class)->create(),
            ['create-servers']
        );

        $response = $this->json('GET', $this->uri . '/1');
        $response
            ->assertStatus(404)
            ->assertExactJson([
                'message' => '',
            ]);
    }
}
