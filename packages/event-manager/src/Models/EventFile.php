<?php 

namespace Mkhodroo\EventManager\Models;

use Illuminate\Database\Eloquent\Model;

class EventFile extends Model
{
    public $table = "em_events_file";
    protected $fillable = [
        'name'
    ];

    // function role() {
    //     return 
    // }
}