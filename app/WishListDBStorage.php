<?php

namespace App;

use App\Models\WishlistModel;
use Darryldecode\Cart\CartCollection;

class WishListDBStorage {

    public function get($key) {
        if($this->has($key)) {
            return new CartCollection(WishlistModel::find($key)->wishlist_data);
        } else {
            return [];
        }
    }

    public function has($key) {
        return WishlistModel::find($key);
    }

    public function put($key, $value) {
        if($row = WishlistModel::find($key)) {
            // update
            $row->wishlist_data = $value;
            $row->save();
        } else {
            WishlistModel::create([
                'id'            => $key,
                'wishlist_data' => $value
            ]);
        }
    }


}
