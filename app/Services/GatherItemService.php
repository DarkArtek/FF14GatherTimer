<?php

namespace App\Services;

use App\Eloquents\GatherItem;
use App\Http\Requests\GatherItemStoreRequest;
use App\Http\Requests\GatherItemUpdateRequest;
use App\Repositories\Interfaces\GatherItemRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

/**
 * 採取アイテムサービス
 *
 * Class GatherItemService
 * @package App\Services
 */
class GatherItemService
{
    /**
     * @var GatherItemRepositoryInterface
     */
    private $gatherItemRepository;

    /**
     * GatherItemService constructor.
     * @param GatherItemRepositoryInterface $gatherItemRepository
     */
    public function __construct(
        GatherItemRepositoryInterface $gatherItemRepository
    ) {
        $this->gatherItemRepository = $gatherItemRepository;
    }

    /**
     * 全ての採取アイテムを取得
     *
     * @return Collection
     */
    public function findAll(): Collection
    {
        return $this->gatherItemRepository->findAll();
    }

    /**
     * Idから採取アイテムを取得
     *
     * @param $gatherItemId int
     * @return Model|null
     */
    public function findOrNullById($gatherItemId): ?Model
    {
        return $this->gatherItemRepository->findOrNullById($gatherItemId);
    }

    /**
     * 採取アイテムの生成
     *
     * @param  GatherItemStoreRequest $request
     * @return mixed
     * @throws \Exception
     * @throws \Throwable
     */
    public function store(GatherItemStoreRequest $request)
    {
        $gatherItem = new GatherItem($request->only([
            'name',
            'star',
            'level',
            'patch',
            'discernment',
            'purified_items',
        ]));

        // アイコンの保存
        if ($request->has('icon')) {
                $iconName = basename($request->icon->store(config('gatherTimer.storage_path.item')));
                $gatherItem->fill(['icon' => $iconName]);
        }

        return DB::transaction(function () use ($gatherItem, $request) {
            $this->gatherItemRepository->save(
                $gatherItem
            );

            $gatherItem
                ->purifiedItems()
                ->sync($request->get('purified_items', []));
            return $gatherItem;
        });
    }

    /**
     * 採取アイテムの編集
     *
     * @param GatherItem $gatherItem
     * @param  GatherItemUpdateRequest $request
     * @return mixed
     * @throws \Exception
     * @throws \Throwable
     */
    public function update(GatherItem $gatherItem, GatherItemUpdateRequest $request)
    {
        $gatherItem->fill($request->only([
            'name',
            'star',
            'level',
            'patch',
            'discernment',
            'purified_items',
        ]));

        // アイコンの保存
        if ($request->has('icon')) {
            $iconName = basename($request->icon->store(config('gatherTimer.storage_path.item')));
            $gatherItem->fill(['icon' => $iconName]);
        }

        return DB::transaction(function () use ($gatherItem, $request) {
            $this->gatherItemRepository->save(
                $gatherItem
            );

            $gatherItem
                ->purifiedItems()
                ->sync($request->get('purified_items', []));
            return $gatherItem;
        });
    }

    /**
     * 採取アイテムの削除
     *
     * @param GatherItem $gatherItem
     * @throws \Exception
     * @throws \Throwable
     */
    public function delete(GatherItem $gatherItem): void
    {
        DB::transaction(function () use ($gatherItem) {
            $this->gatherItemRepository->delete($gatherItem);
        });
    }
}
