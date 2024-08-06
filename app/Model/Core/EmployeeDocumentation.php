<?php

namespace App\Model\Core;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class EmployeeDocumentation extends Model
{
    protected $table = 'employee_documentation';
    protected $fillable = [
        'id',        
        'name',
        'file',
        'type',
        'approved',
        'employee_id'        
    ];
}