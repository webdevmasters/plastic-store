<?php

namespace App\Providers;

use App\CartDBStorage;
use App\WishListDBStorage;
use Darryldecode\Cart\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\ServiceProvider;

class CartServiceProvider extends ServiceProvider {

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Boot the service provider.
     */
    public function boot() {
        if(function_exists('config_path')) {
            $this->publishes([
                __DIR__ . '/config/config.php' => config_path('shopping_cart.php'),
            ], 'config');
        }
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register() {
        $this->app->singleton('cart', function($app) {
            $eventsClass = config('shopping_cart.events');
            $storage =  Auth::check() ? new CartDBStorage() : $app['session'];
            $events = $eventsClass ? new $eventsClass() : $app['events'];
            $instanceName = 'cart';
            $session_key = Auth::check() ?Auth::user()->id: Request::session()->getId();

            return new Cart(
                $storage,
                $events,
                $instanceName,
                $session_key,
                config('shopping_cart')
            );
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides() {
        return array();
    }
}
