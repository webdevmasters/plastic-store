<?php


namespace App\Repositories\interfaces;


use App\Models\Product;
use Illuminate\Http\Request;

interface WishlistInterface {

    public function index();

    public function destroyFromWishlist($id) ;


    public function store(Request $request) ;
}
