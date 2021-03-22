<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Promotion;

class HomeController extends Controller {

    public function changeLanguage($language) {
        if(in_array($language, \Config::get('app.locales'))) {
            session(['locale' => $language]);
        }

        return app()->currentLocale();
    }

    public function index() {
        $promotions = Promotion::all();
        $popular_products = Product::whereAvailable(1)->with('sizes', 'images')->take(15)->get();
        $new_products = Product::whereAvailable(1)->with('sizes', 'images')->orderByDesc('created_at')->take(15)->get();
        $sale_products = Product::whereSale(1)->with('sizes', 'images')->orderByDesc('updated_at')->take(15)->get();

        return view('webapp.shop.index', compact('popular_products', 'new_products', 'sale_products', 'promotions'));
    }

    public function shippingInfo() {
        return view('webapp.shop.shipping_info');
    }

    public function sellingTerms() {
        return view('webapp.shop.selling_terms');
    }

    public function about() {
        return view('webapp.shop.about');
    }

    public function faqs() {
        return view('webapp.shop.faqs');
    }
}
