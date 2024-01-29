<?php 

namespace Mkhodroo\ValueChain\Models;

use Illuminate\Database\Eloquent\Model;

class Isic extends Model
{
    public $table = "isics";
    protected $fillable = [
        'name', 'isic', 'national_unique_code'
    ];

    // function role() {
    //     return 
    // }
}