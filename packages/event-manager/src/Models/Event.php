<?php 

namespace Mkhodroo\EventManager\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    public $table = "em_events";
    protected $fillable = [
        'name'
    ];

    // function role() {
    //     return 
    // }
}