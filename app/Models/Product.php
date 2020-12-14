<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model {

    use HasFactory;

    public function images() {
        $this->hasMany(Image::class);
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
