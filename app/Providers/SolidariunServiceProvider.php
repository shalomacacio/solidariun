<?php

namespace Solidariun\Providers;

use Illuminate\Support\ServiceProvider;

class SolidariunServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //$this->app->bind(MembroRepository::class, MembroRepositoryEloquent::class);
        $this->app->bind(\Solidariun\Repositories\CampanhaRepository::class, \Solidariun\Repositories\CampanhaRepositoryEloquent::class);
        //:end-bindings:
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
