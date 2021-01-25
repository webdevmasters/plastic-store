<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Role
 *
 * @mixin IdeHelperUser
 */
class Role extends Model {

    use HasFactory;

    public $timestamps = false;

    public function users() {
        return $this->belongsToMany(User::class);
    }
}
