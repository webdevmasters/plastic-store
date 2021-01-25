<?php

namespace App\Providers;

use App\Repositories\OrderInterface;
use App\Repositories\OrderRepository;
use Illuminate\Support\ServiceProvider;

class BackendServiceProvider extends ServiceProvider {

    public function register() {
        $this->app->bind(OrderInterface::class,
            OrderRepository::class
        );
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot() {
        //
    }
}
