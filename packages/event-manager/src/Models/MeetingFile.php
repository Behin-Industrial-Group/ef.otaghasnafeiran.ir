<?php 

namespace Mkhodroo\EventManager\Models;

use Illuminate\Database\Eloquent\Model;

class MeetingFile extends Model
{
    public $table = "em_meetings_file";
    protected $fillable = [
        'name'
    ];

    // function role() {
    //     return 
    // }
}