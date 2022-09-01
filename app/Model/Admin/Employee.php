<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = ['id', 'name',];

    //varios empleados le Pertenece a varios reportes
    public function reports()
    {
        return $this->belongsToMany(Report::class);
    }
}
