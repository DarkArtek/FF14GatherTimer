<?php

namespace App\Repositories\Interfaces;

use App\Eloquents\GatherItemPurified;

interface GatherItemPurifiedRepositoryInterface
{
    /**
     * レコードの作成もしくは更新
     *
     * @param GatherItemPurified $gatherItemPurified
     * @return bool
     */
    public function save(GatherItemPurified $gatherItemPurified);
}
