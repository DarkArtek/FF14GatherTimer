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
    public function testIndexSuccess()
    {
        Passport::actingAs(
            factory(User::class)->create(),
            ['create-servers']
        );

        $this->createTestData();
        $this->json('GET', $this->uri)
            ->assertJsonStructure(['data' => [$this->dataStructure]])
            ->assertStatus(200);
    }

    /**
     * 非認証
     */
    public function testIndexUnauthenticated()
    {
        $this->createTestData();
        $this->json('GET', $this->uri)
            ->assertJsonStructure(['data' => [$this->dataStructure]])
            ->assertStatus(200);
    }

    /**
     * 正常系 Structureテスト
     * {id}のgetリクエスト
     */
    public function testShowSuccess()
    {
        Passport::actingAs(
            factory(User::class)->create(),
            ['create-servers']
        );

        if ($this->isShowMultiReturn) {
            $structure = ['data' => [$this->dataStructure]];
        } else {
            $structure = ['data' => $this->dataStructure];
        }

        $this->createTestData();
        $this->json('GET', $this->uri .'/' . $this->showId)
            ->assertJsonStructure($structure)
            ->assertStatus(200);
    }

    /**
     * 非認証
     */
    public function testShowUnauthenticated()
    {
        if ($this->isShowMultiReturn) {
            $structure = ['data' => [$this->dataStructure]];
        } else {
            $structure = ['data' => $this->dataStructure];
        }

        $this->createTestData();
        $this->json('GET', $this->uri .'/' . $this->showId)
            ->assertJsonStructure($structure)
            ->assertStatus(200);
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

        $this->json('GET', $this->uri . '/1')
            ->assertStatus(404)
            ->assertExactJson([
                'message' => '',
            ]);
    }
}
