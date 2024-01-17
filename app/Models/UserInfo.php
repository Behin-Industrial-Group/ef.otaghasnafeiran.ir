<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserInfo extends Model
{
    use HasFactory;
    public $table = "user_info";
    protected $fillable = [
        'user_id',
        'fname',
        'lname',
        'mobile',
        'phone',
        'address', 
        'postal_code'
    ];
}
