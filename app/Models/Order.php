<?php

namespace App\Models;

use App\Enums\OrderStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


/**
 * App\Models\Order
 *
 * @mixin \Eloquent
 */
class Order extends Model {

    use HasFactory;

    protected $fillable = [
        'order_number','user_id', 'status', 'total', 'items', 'payment', 'shipping', 'first_name', 'last_name', 'email', 'address', 'city', 'country', 'zip_code', 'phone', 'note'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function items() {
        return $this->hasMany(OrderItem::class);
    }

    public function getStatusAttribute($status){
        return OrderStatus::fromValue((int)$status)->key;
    }
}
