<?php

namespace BehinFindOldIsic\App\Models;

use Illuminate\Database\Eloquent\Model;

class Isic extends Model
{
    public $table = 'isics';
    protected $fillable = [
        'unique_id',
        'code',
        '_1',
        'level1',
        'level2',
        'level3',
        'level4',
        'level5',
        'old_isic_title',
        'old_isic_code',
        'comment'
    ];
}
