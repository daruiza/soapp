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
        'active'
    ];

    public function scopeActive($query, $active)
    {
        return $active ?
            $query->where('active', intval($active)) :
            $query->where('active', 1);
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
