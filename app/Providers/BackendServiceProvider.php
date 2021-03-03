<?php

namespace App\Providers;

use App\Repositories\interfaces\CartInterface;
use App\Repositories\interfaces\MessageInterface;
use App\Repositories\interfaces\OrderInterface;
use App\Repositories\interfaces\ProductInterface;
use App\Repositories\interfaces\WishlistInterface;
use App\Repositories\repositories\CartRepository;
use App\Repositories\repositories\MessageRepository;
use App\Repositories\repositories\OrderRepository;
use App\Repositories\repositories\ProductRepository;
use App\Repositories\repositories\WishlistRepository;
use Illuminate\Support\ServiceProvider;

class BackendServiceProvider extends ServiceProvider {

    public function register() {
        $this->app->bind(OrderInterface::class, OrderRepository::class);
        $this->app->bind(ProductInterface::class, ProductRepository::class);
        $this->app->bind(MessageInterface::class, MessageRepository::class);
        $this->app->bind(CartInterface::class, CartRepository::class);
        $this->app->bind(WishlistInterface::class, WishlistRepository::class);
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
