<?php

namespace App\Model\Admin;

use Employee;
use Illuminate\Database\Eloquent\Model;

class Commerce extends Model
{
    protected $fillable = [
        'id',
        'name',
        'nit',
        'department',
        'city',
        'adress',
        'description',
        'logo',
        'currency',
        'country',
        'label',
        'apiLogin',
        'apiKey',
        'active'
    ];

    //un comercio lo pueden tener muchos empleados
    public function employee()
    {
        return $this->hasMany(Employee::class, 'id');
    }

    /*public function options(){
    	//reutiliza el namespace
        return $this->belongsToMany(Option::class);
    }*/
}
