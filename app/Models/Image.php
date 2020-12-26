<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @mixin IdeHelperImage
 */
class Image extends Model {

    use HasFactory;

    public $timestamps = false;

    public function product() {
        return $this->belongsTo(Product::class);
    }

//    function getPathAttribute($value) {
//        if(File::exists('/storage/' . $value . '/' . $this->name))
//            $imagePath = $this->path;
//        else $imagePath = 'storage/images/no-image.png';
//
//        return $imagePath;
//    }

}
