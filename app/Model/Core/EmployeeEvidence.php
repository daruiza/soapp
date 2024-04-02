<?php

namespace App\Model\Core;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class EmployeeEvidence extends Model
{
    protected $table = 'employee_evidences';
    protected $fillable = [
        'id',        
        'name',
        'file',
        'type',
        'approved',
        'employee_report_id'        
    ];
}