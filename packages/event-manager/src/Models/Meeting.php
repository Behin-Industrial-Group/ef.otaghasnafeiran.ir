<?php 

namespace Mkhodroo\EventManager\Models;

use Illuminate\Database\Eloquent\Model;

class Meeting extends Model
{
    public $table = "em_meetings";
    protected $fillable = [
        'name'
    ];

    // function role() {
    //     return 
    // }
}