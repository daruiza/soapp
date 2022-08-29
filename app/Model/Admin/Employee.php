<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = ['id', 'commerce_id',];

    //un empleado solo puede tener un comercio
    public function commerces()
    {
        return $this->belongsTo(Commerce::class, 'commerce_id');
    }
}
