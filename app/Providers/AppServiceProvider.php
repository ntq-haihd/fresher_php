<?php

namespace App\Providers;

use App\Services\CategoriesService;
use App\Services\ProductsService;
use Illuminate\Support\ServiceProvider;
use App\Repositories\UsersRepository;
use App\Repositories\UsersInterface;
use App\Repositories\ProductsRepository;
use App\Repositories\CategoriesRepository;
use App\Repositories\AttributeValuesService;
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
        $this->app->bind(BaseRepository::class, AttributesRepository::class);
        $this->app->bind(BaseRepository::class, AttributeValuesRepository::class);
        $this->app->bind(BaseRepository::class, AttributesVariablesRepository::class);
        $this->app->bind(BaseRepository::class, ProductVariablesRepository::class);
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
