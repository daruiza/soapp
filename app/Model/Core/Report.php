<?php

namespace App\Model\Core;

use Commerce;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $fillable = ['id', 'name', 'commerce_id',];

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
