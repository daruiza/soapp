<?php

namespace App\Model\Core;

use App\Model\Core\Commerce;
use App\Model\Core\Employee;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $table = 'reports';
    protected $fillable =
    [
        'id',
        'name',
        'project',
        'responsible',
        'email_responsible',
        'phone_responsible',
        'date',
        'commerce_id',
    ];

    public function scopeName($query, $name)
    {
        return is_null($name) ?  $query : $query->where('name', 'LIKE', '%' . $name . '%');
    }

    //a varios reportes le Pertenece un comercios
    public function commerce()
    {
        return $this->belongsTo(Commerce::class);
    }

    //a varios reportes le Pertenece varios colaboradores
    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
