<?php

namespace App\Model\Core;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class EmployeeReport extends Model
{
    protected $table = 'employee_report';
    protected $fillable = [
        'id',
        'attributes',
        'employee_state',
        'employee_id',
        'report_id'        
    ];

    

    public function scopeEmployee_state($query, $employee_state)
    {
        return is_null($employee_state) ?  $query : $query->where('employee_state', 'LIKE',  $employee_state );
    }

    public function scopeEmployee_id($query, $employee_id)
    {
        return is_null($employee_id) ?  $query : $query->where('employee_id', $employee_id );
    }

    public function scopeReport_id($query, $report_id)
    {
        return is_null($report_id) ?  $query : $query->where('report_id', $report_id );
    }
   
}
