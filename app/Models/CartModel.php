<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @mixin IdeHelperCategory
 */
class CartModel extends Model {

    /**
     * Override eloquent default table
     * @var string
     */
    protected $table = 'cart';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'cart_data',
    ];

    /**
     * Mutator for cart
     * @param $value
     */
    public function setCartDataAttribute($value) {
        $this->attributes['cart_data'] = serialize($value);
    }

    /**
     * Accessor for wishlist_column
     * @param $value
     * @return mixed
     */
    public function getCartDataAttribute($value) {
        return unserialize($value);
    }
}
