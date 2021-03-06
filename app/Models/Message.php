<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Order
 *
 * @mixin \Eloquent
 */
class Message extends Model {

    use HasFactory;
    public $answer;

    protected $fillable=['name','email','subject','message','answered'];
}
