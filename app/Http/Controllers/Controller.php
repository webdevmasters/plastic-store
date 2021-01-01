<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController {

    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index() {
        $popular_products = Product::whereAvailable(1)->take(15)->get();
        $new_products = Product::whereAvailable(1)->orderByDesc('created_at')->take(15)->get();
        $sale_products = Product::whereSale(1)->orderByDesc('updated_at')->take(15)->get();

        return view('webapp.shop.index', compact('popular_products', 'new_products', 'sale_products'));
    }


}
