<?php

namespace BehinFindOldIsic\App\Models;

use Illuminate\Database\Eloquent\Model;

class IsicComment extends Model
{
    public $table = 'isic_comments';
    protected $fillable = [
        'isic_id',
        'fullname',
        'mobile',
        'comment',
        'union_name',
        'city',
        'type',
        'old_isic_code'
    ];
}
