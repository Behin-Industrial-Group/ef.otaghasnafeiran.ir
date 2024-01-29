<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Namayeshgah extends Model
{
    use HasFactory;
    use SoftDeletes;
    public $table='namayeshgah';
    protected $fillable = [
        'user_id', 'pr_phone', 'address', 'start_date', 'end_date', 'number_of_booth1', 'meterage_of_booth1', 'price_of_booth1_per_meter', 'number_of_booth2', 'meterage_of_booth2', 'price_of_booth2_per_meter', 'number_of_booth3', 'meterage_of_booth3', 'price_of_booth3_per_meter', 'number_of_booth4', 'meterage_of_booth4', 'price_of_booth4_per_meter', 'performancer_name', 'performancer_lname', 'performancer_nid', 'performancer_mobile', 'price_file', 'place_checklist_file', 'booth_checklist_file', 'performance_checklist_file', 'city_id'
    ];
}
