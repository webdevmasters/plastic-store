<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


/**
 * App\Models\OrderItem
 * @mixin \Eloquent
 */
class OrderItem extends Model {

    protected $fillable = [
        'product_id','quantity', 'price', 'size', 'color_name'
    ];

    public function product() {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
