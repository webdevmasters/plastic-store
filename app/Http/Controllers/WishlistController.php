<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class WishlistController extends Controller {

    public function index() {
        return view('webapp.wishlist.index');
    }

    public function destroyFromWishlist($id) {
        Wishlist::remove($id);

        return redirect()->back();
    }

    public function store(Request $request) {
        $product = Product::findOrFail($request->product_id);
        $duplicates = false;
        if(!Wishlist::isEmpty()) {
            foreach(Wishlist::getContent() as $item) {
                if($request->product_id == $item->associatedModel->id) {
                    $duplicates = true;
                    break;
                }
            }
        }
        if(!$duplicates) {
            Wishlist::add(array(
                'id'              => uniqid($request->product_id),
                'name'            => $product->name,
                'price'           => 0,
                'quantity'        => 1,
                'attributes'      => array(),
                'associatedModel' => $product
            ));
        }

        $mini_wishlist = view('webapp.includes.wishlist.mini_wishlist')->render();

        return response()->json(['mini-wishlist' => $mini_wishlist, 'duplicate' => $duplicates, 'product_name' => $product->name]);
    }
}
