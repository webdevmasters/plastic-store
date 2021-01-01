<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;

/**
 * @mixin IdeHelperImage
 */
class Image extends Model {

    use HasFactory;

    public $timestamps = false;

    public function product() {
        return $this->belongsTo(Product::class);
    }

    public function getOriginalName() {
        $original_name = 'storage/' . $this->path . '/' . $this->name;
        if(File::exists($original_name))
            return $original_name;
        else return 'static/images/shop/not-found.png';
    }
}
