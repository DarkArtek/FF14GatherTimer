<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if ($this->app->environment() !== 'production') {
            $this->app->register(\Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class);
        }

        $this->app->bind(
            \App\Repositories\Interfaces\AreaRepositoryInterface::class,
            \App\Repositories\AreaRepository::class
        );
        $this->app->bind(
            \App\Repositories\Interfaces\RegionRepositoryInterface::class,
            \App\Repositories\RegionRepository::class
        );
        $this->app->bind(
            \App\Repositories\Interfaces\ClassRepositoryInterface::class,
            \App\Repositories\ClassRepository::class
        );
        $this->app->bind(
            \App\Repositories\Interfaces\GatherPlaceTypeRepositoryInterface::class,
            \App\Repositories\GatherPlaceTypeRepository::class
        );
        $this->app->bind(
            \App\Repositories\Interfaces\GatherTimeRepositoryInterface::class,
            \App\Repositories\GatherTimeRepository::class
        );
        $this->app->bind(
            \App\Repositories\Interfaces\PurifiedRepositoryInterface::class,
            \App\Repositories\PurifiedRepository::class
        );
        $this->app->bind(
            \App\Repositories\Interfaces\GatherPlaceGatherItemRepositoryInterface::class,
            \App\Repositories\GatherPlaceGatherItemRepository::class
        );
        $this->app->bind(
            \App\Repositories\Interfaces\GatherPlaceRepositoryInterface::class,
            \App\Repositories\GatherPlaceRepository::class
        );
    }
}
