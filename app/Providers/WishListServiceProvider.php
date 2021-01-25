<?php


namespace App\Providers;


use App\WishListDBStorage;
use Darryldecode\Cart\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\ServiceProvider;

class WishListServiceProvider extends ServiceProvider {

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot() {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register() {
        $this->app->singleton('wishlist', function($app) {
            $storage = Auth::check() ? new WishListDBStorage() : $app['session'];
            $events = $app['events'];
            $instanceName = 'wishlist';
            $session_key = Auth::check() ? Auth::user()->id : Request::session()->token();

            return new Cart(
                $storage,
                $events,
                $instanceName,
                $session_key,
                config('shopping_cart')
            );
        });
    }
}
