<?php

namespace App\Model\Core;

use App\Model\Core\Employee;

use Illuminate\Database\Eloquent\Model;

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

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}