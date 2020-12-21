<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


/**
 * @mixin IdeHelperSubCategory
 */
class SubCategory extends Model {

    use HasFactory;

    public function category() {
        $this->belongsTo(Category::class);
    }
}
