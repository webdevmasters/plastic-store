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

    public function subcategories() {
        return $this->hasMany(SubCategory::class);
    }
}
