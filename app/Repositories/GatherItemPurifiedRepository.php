<?php

namespace App\Repositories;

use App\Eloquents\GatherItemPurified;
use App\Repositories\Interfaces\GatherItemPurifiedRepositoryInterface;

/**
 * 採取アイテムと精製アイテムを紐付けるデータのリポジトリ
 * Class GatherItemRepository
 * @package App\Repositories
 */
class GatherItemPurifiedRepository implements GatherItemPurifiedRepositoryInterface
{
    /**
     * レコードの作成もしくは更新
     *
     * @param GatherItemPurified $gatherItemPurified
     * @return bool
     */
    public function save(GatherItemPurified $gatherItemPurified)
    {
        return $gatherItemPurified->save();
    }
}
