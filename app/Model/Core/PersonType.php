<?php

namespace App\Model\Core;

use Illuminate\Database\Eloquent\Model;


class PersonType extends Model
{
    protected $table = 'person_type';
    protected $fillable = 
    [
        'id',
        'code',
        'type',
    ];

    

}
