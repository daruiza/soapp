<?php

namespace App\Model\Core;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Employee extends Model
{
    protected $table = 'employees';
    protected $fillable = [
        'id',
        'name',
        'lastname',
        'identification',
        'identification_type',
        'birth_date',
        'email',
        'phone',
        'adress',
        'active',
        'photo'
    ];

    //varios colaboradores le Pertenece a varios reportes
    public function reports()
    {
        return $this->belongsToMany(Report::class);
    }

    public function scopeCommerce_id($query, $commerceid)
    {
        return is_null($commerceid) ?  $query : $query->where('commerce_id', $commerceid);
    }

    public function scopeActive($query, $active)
    {
        return isset($active) ?
            $query->where('active', intval($active)) :
            $query->where('active', 1);
    }

    public function scopeIdentification($query, $identification)
    {
        return is_null($identification) ?  $query : $query->where('id', 'LIKE', '%' . $identification . '%');
    }

    public function scopeName($query, $name)
    {
        return is_null($name) ?  $query : $query->where('name', 'LIKE', '%' . $name . '%');
    }
}
