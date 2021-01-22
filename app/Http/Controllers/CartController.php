<?php

namespace App\Http\Controllers;

use App\Models\Color;
use App\Models\Product;
use Cart;
use Illuminate\Http\Request;

class CartController extends Controller {

    public function store(Request $request) {
        $product = Product::findOrFail($request->product_id);
        $color = Color::whereCode($request->color)->first();
        $duplicates = false;

        if(!Cart::isEmpty()) {
            foreach(Cart::getContent() as $item) {
                if($request->product_id == $item->associatedModel->id && $request->color == $item->attributes->color_code && $request->size == $item->attributes->size) {
                    Cart::update($item->id, array(
                        'quantity' => array(
                            'relative' => false,
                            'value'    => $request->quantity
                        ),
                    ));
                    $duplicates = true;
                    break;
                }
            }
        }
        if(!$duplicates) {
            Cart::add(array(
                'id'              => uniqid($request->product_id),
                'name'            => $product->name,
                'price'           => $request->price,
                'quantity'        => $request->quantity,
                'attributes'      => array('size' => $request->size, 'color_code' => $color->code, 'color_name' => $color->name),
                'associatedModel' => $product
            ));
        }

        $mini_cart = view('webapp.includes.cart.mini_cart')->render();

        return response()->json(['mini_cart' => $mini_cart]);
    }

    public function destroyFromMiniCart($id) {
        Cart::remove($id);

        $mini_cart = view('webapp.includes.cart.mini_cart')->render();

        return response()->json(['mini_cart' => $mini_cart]);
    }

    public function destroyFromCart($id) {
        Cart::remove($id);

        return redirect()->back();
    }

    public function index() {
        return view('webapp.cart.index');
    }

    public function updateMiniCart($id, $quantity) {
        Cart::update($id, array(
            'quantity' => array(
                'relative' => false,
                'value'    => $quantity
            ),
        ));
        $mini_cart = view('webapp.includes.cart.mini_cart')->render();
        $cart_summary = view('webapp.includes.cart.cart_summary')->render();

        return response()->json(['mini_cart' => $mini_cart, 'cart_summary' => $cart_summary]);
    }
}
