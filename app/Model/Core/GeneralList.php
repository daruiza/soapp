<?php

namespace App\Model\Core;

use Illuminate\Database\Eloquent\Model;

class GeneralList extends Model
{
    protected $table = 'general_lists';
    protected $fillable =
    [
        'id',
        'name',
        'value',
    ];
}
