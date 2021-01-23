<?php

namespace App;

use App\Models\CartModel;
use Darryldecode\Cart\CartCollection;

class CartDBStorage {

    public function get($key) {
        if($this->has($key)) {
            return new CartCollection(CartModel::find($key)->cart_data);
        } else {
            return [];
        }
    }

    public function has($key) {
        return CartModel::find($key);
    }

    public function put($key, $value) {
        if($row = CartModel::find($key)) {
            // update
            $row->cart_data = $value;
            $row->save();
        } else {
            CartModel::create([
                'id'        => $key,
                'cart_data' => $value
            ]);
        }
    }


}
