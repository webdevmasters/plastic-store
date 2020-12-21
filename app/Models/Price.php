<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @mixin IdeHelperPrice
 */
class Price extends Model {

    use HasFactory;

    public $timestamps = false;
    protected $fillable = ['value'];

    public function products() {
        $this->belongsToMany(Product::class);
    }
}
