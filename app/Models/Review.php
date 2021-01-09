<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @mixin IdeHelperProduct
 */
class Review extends Model {

    use HasFactory;

    protected $fillable = [
        'reviewer',
        'comment',
        'rating',
        'email',
        'user_id',
        'product_id',
    ];

    public function product() {
        return $this->belongsTo(Product::class);
    }
}
