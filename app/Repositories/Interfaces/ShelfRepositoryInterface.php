<?php

namespace App\Repositories\Interfaces;

use App\Eloquents\Shelf;

interface ShelfRepositoryInterface
{
    /**
     * レコードの作成もしくは更新
     *
     * @param Shelf $shelf
     * @return bool
     */
    public function save(Shelf $shelf);
}
