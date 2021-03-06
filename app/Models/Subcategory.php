<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use function Symfony\Component\String\s;


/**
 * App\Models\Subcategory
 *
 * @mixin IdeHelperSubCategory
 */
class Subcategory extends Model {

    use HasFactory;

    public $timestamps = false;

    protected $fillable = ['name,slug'];
    protected $withCount = ['products'];

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function getRouteKeyName() {
        return 'slug';
    }

    public function products() {
        return $this->hasMany(Product::class);
    }
}
