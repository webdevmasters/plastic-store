<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @mixin IdeHelperCategory
 */
class Category extends Model {

    use HasFactory;

    public $timestamps = false;

    protected $fillable=['name,slug'];

    public function subcategories() {
        return $this->hasMany(Subcategory::class);
    }

    public function getRouteKeyName() {
        return 'slug';
    }
}
