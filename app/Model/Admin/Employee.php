<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $table = 'employees';
    protected $fillable = [
        'id',
        'name',
        'lastname',
        'birth_date',
        'email',
        'phone',
        'adress',
        'active',
        'photo'
    ];

    public function scopeActive($query, $active)
    {
        return $active ?
            $query->where('active', intval($active)) :
            $query->where('active', 1);
    }

    public function scopeId($query, $id)
    {
        return is_null($id) ?  $query : $query->where('id', 'LIKE', '%' . $id . '%');
    }

    public function scopeName($query, $name)
    {
        return is_null($name) ?  $query : $query->where('name', 'LIKE', '%' . $name . '%');
    }

    //varios empleados le Pertenece a varios reportes
    public function reports()
    {
        return $this->belongsToMany(Report::class);
    }
}
