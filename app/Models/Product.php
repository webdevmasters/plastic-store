<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @mixin IdeHelperProduct
 */
class Product extends Model {

    use HasFactory;

    protected $fillable = ['code', 'name', 'description', 'manufacturer', 'sizes',
        'prices', 'discounted_prices', 'colors', 'category', 'subcategory', 'available', 'sale'];

    public function images() {
        return $this->hasMany(Image::class);
    }

    public function colors() {
        return $this->belongsToMany(Color::class, 'product_color')->withTimestamps();
    }

    public function prices() {
        return $this->belongsToMany(Price::class, 'product_price')->withTimestamps()->withPivot(['discounted_price']);
    }

    public function sizes() {
        return $this->belongsToMany(Size::class, 'product_size')->withTimestamps();
    }
}
