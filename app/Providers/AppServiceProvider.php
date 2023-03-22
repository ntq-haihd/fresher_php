<?php

namespace App\Providers;

use App\Services\CategoriesService;
use App\Services\ProductsService;
use Illuminate\Support\ServiceProvider;
use App\Repositories\UsersRepository;
use App\Repositories\UsersInterface;
use App\Repositories\ProductsRepository;
use App\Repositories\CategoriesRepository;
use App\Repositories\BaseRepository;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(UsersInterface::class, UsersRepository::class);
        $this->app->bind(BaseRepository::class, CategoriesRepository::class);
        $this->app->bind(BaseRepository::class, ProductsRepository::class);
        $this->app->bind(CategoriesService::class);
        $this->app->bind(ProductsService::class);


    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
