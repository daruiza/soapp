<?php

namespace App\Model\Core;

use Illuminate\Database\Eloquent\Model;

use App\Model\Core\Commerce;
use App\User;

class Employee extends Model
{
    protected $table = 'customers';
    protected $fillable =
    [
        'id',
        'name',
        'commerce_id',
    ];

    public function commerce()
    {
        return $this->belongsTo(Commerce::class, 'id', 'commerce_id');
    }
}
