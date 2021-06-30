<?php

namespace App\Providers;

use App\Repository\BaseRepository;
use App\Repository\PizzaRepository;
use Illuminate\Support\ServiceProvider;
use App\Repository\Interfaces\BaseRepositoryInterface;
use App\Repository\Interfaces\PizzaRepositoryInterface;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(BaseRepositoryInterface::class, BaseRepository::class);
        $this->app->bind(PizzaRepositoryInterface::class, PizzaRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
