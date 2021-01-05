<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


/**
 * @mixin IdeHelperSubCategory
 */
class Subcategory extends Model {

    use HasFactory;

    public function category() {
       return $this->belongsTo(Category::class);
    }
}
