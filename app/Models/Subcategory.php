<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


/**
 * App\Models\Subcategory
 *
 * @mixin IdeHelperSubCategory
 */
class Subcategory extends Model {

    use HasFactory;

    public $timestamps = false;

    protected $fillable = ['name,slug'];

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function getRouteKeyName() {
        return 'slug';
    }
}
