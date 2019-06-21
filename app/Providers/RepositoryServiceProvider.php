<?php

namespace Solidariun\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(\Solidariun\Repositories\CampanhaRepository::class, \Solidariun\Repositories\CampanhaRepositoryEloquent::class);
        $this->app->bind(\Solidariun\Repositories\UserRepository::class, \Solidariun\Repositories\UserRepositoryEloquent::class);
        $this->app->bind(\Solidariun\Repositories\PaymentRepository::class, \Solidariun\Repositories\PaymentRepositoryEloquent::class);
        //:end-bindings:
    }
}
