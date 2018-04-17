<?php

namespace App\Repositories;

use App\Eloquents\Shelf;
use App\Repositories\Interfaces\ShelfRepositoryInterface;

/**
 * 採取場所の棚情報のリポジトリ
 * Class ShelfRepository
 * @package App\Repositories
 */
class ShelfRepository implements ShelfRepositoryInterface
{
    /**
     * レコードの作成もしくは更新
     *
     * @param Shelf $shelf
     * @return bool
     */
    public function save(Shelf $shelf)
    {
        return $shelf->save();
    }
}
