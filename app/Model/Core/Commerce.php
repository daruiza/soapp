<?php

namespace App\Model\Core;

use Illuminate\Database\Eloquent\Model;

use App\User;
use App\Model\Core\Employee;

class Commerce extends Model
{
    protected $fillable =
    [
        'id',
        'name',
        'nit',
        'department',
        'city',
        'adress',
        'description',
        'logo',
        'active',
        'user_id'
    ];

    public function scopeActive($query, $active)
    {
        return isset($active) ?
            $query->where('active', intval($active)) :
            $query->where('active', 1);
    }

    public function scopeName($query, $name)
    {
        return is_null($name) ?  $query : $query->where('name', 'LIKE', '%' . $name . '%');
    }

    public function scopeNit($query, $nit)
    {
        return is_null($nit) ?  $query : $query->where('nit', 'LIKE', '%' . $nit . '%');
    }

    public function scopeDepartment($query, $department)
    {
        return is_null($department) ?  $query : $query->where('department', 'LIKE', '%' . $department . '%');
    }

    public function scopeCity($query, $city)
    {
        return is_null($city) ?  $query : $query->where('city', 'LIKE', '%' . $city . '%');
    }

    public function scopeUser_id($query, $userid)
    {
        return is_null($userid) ?  $query : $query->where('user_id', $userid);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    //a un commerce le pertenecen varios reportes
    public function reports()
    {
        return $this->hasMany(Report::class);
    }
}
