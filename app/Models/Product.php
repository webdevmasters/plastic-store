<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

/**
 * App\Models\Product
 *
 * @mixin IdeHelperProduct
 */
class Product extends Model {

    use HasFactory, HasSlug;

    protected $fillable = ['code', 'name', 'description', 'manufacturer', 'sizes',
        'prices', 'discounted_prices', 'colors', 'category', 'subcategory', 'available', 'sale'];

    protected $withCount = ['reviews'];

    public function getSlugOptions(): SlugOptions {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }

    public function getRouteKeyName() {
        return 'slug';
    }

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function subcategory() {
        return $this->belongsTo(Subcategory::class);
    }

    public function colors() {
        return $this->belongsToMany(Color::class, 'product_color');
    }

    public function sizes() {
        return $this->belongsToMany(Size::class, 'product_size');
    }

    public function minPrice() {
        return $this->loadMin('prices','value')->prices_min_value;
    }

    public function prices() {
        return $this->belongsToMany(Price::class, 'product_price')->withPivot(['discounted_price']);
    }

    public function minDiscountedPrice() {
        return min($this->prices()->pluck('discounted_price')->all());
    }

    public function maxPrice() {
        return $this->loadMax('prices','value')->prices_max_value;
    }

    public function savings() {
        return ($this->prices->first()->value - $this->prices->first()->pivot->discounted_price) * 100 / $this->prices->first()->value . '%';
    }

    public function maxDiscountedPrice() {
        return max($this->prices->pluck('discounted_price')->all());
    }

    public function mainImage() {
        $imagePath = 'storage/' . $this->images->pluck('path')->first() . '/' . $this->images->pluck('name')->first();
        if(File::exists($imagePath))
            return $imagePath;
        else return 'static/images/shop/not-found.png';
    }

    public function images() {
        return $this->hasMany(Image::class);
    }

    public function avgRating() {
        if($this->reviews_count > 0)
            return round($this->reviews->pluck('rating')->avg(), 0);
        else return 0;
    }

    public function reviews() {
        return $this->hasMany(Review::class);
    }

    public function altImage() {
        return '/storage/images/no-image.png';
    }
}
