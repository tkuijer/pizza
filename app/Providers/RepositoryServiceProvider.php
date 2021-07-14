<?php

namespace App\Providers;

use App\Repository\BaseRepository;
use App\Repository\PizzaRepository;
use App\Repository\ToppingsRepository;
use Illuminate\Support\ServiceProvider;
use App\Repository\Interfaces\BaseRepositoryInterface;
use App\Repository\Interfaces\PizzaRepositoryInterface;
use App\Repository\Interfaces\ToppingsRepositoryInterface;

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
        $this->app->bind(ToppingsRepositoryInterface::class, ToppingsRepository::class);
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
