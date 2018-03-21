<?php

namespace App\Repositories;

use App\Eloquents\Purified;
use App\Repositories\Interfaces\PurifiedRepositoryInterface;

/**
 * 精選アイテムリポジトリ
 * Class PurifiedRepository
 * @package App\Repositories
 */
class PurifiedRepository implements PurifiedRepositoryInterface
{
    protected $purified;

    /**
     * PurifiedRepository constructor.
     * @param Purified $purified
     */
    public function __construct(Purified $purified)
    {
        $this->purified = $purified;
    }

    /**
     * 全ての精選アイテムを取得
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function findAll()
    {
        return $this->purified::all();
    }

    /**
     * 採取場所が登録されている精選アイテムを取得
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function findExistsGatherPlace()
    {
        return $this->purified::has('gatherPlaces')->get();
    }

    /**
     * Idから精選アイテムを取得
     *
     * @param $purifiedId int
     * @return null|\Illuminate\Database\Eloquent\Model
     */
    public function findOrNullById($purifiedId)
    {
        return $this->purified->find($purifiedId);
    }

    /**
     * レコードの作成もしくは更新
     *
     * @param Purified $purified
     * @return bool
     */
    public function save(Purified $purified)
    {
        return $purified->save();
    }

    /**
     * レコードの作成もしくは更新
     *
     * @param Purified $purified
     * @return bool
     */
    public function save(Purified $purified)
    {
        return $purified->save();
    }
}
