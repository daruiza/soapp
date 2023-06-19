<?php

namespace App\Model\Core;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Employee extends Model
{
    protected $table = 'employees';
    protected $fillable = [
        'id',
        'identification_type',
        'identification',
        'name',
        'lastname',
        'email',
        'phone',
        'adress',        
        'active',
        'photo',
        'eps',
        'birth_date',
        'commerce_id',
        'is_employee'
    ];

    //varios colaboradores le Pertenece a varios reportes
    public function reports()
    {
        return $this->belongsToMany(Report::class);
    }

    public function scopeState($query, $employeeid, $reportid)
    {
        return is_null($reportid) || is_null($employeeid) ?  null : $query
            ->select('employee_report.id', 'employee_report.employee_state', 'employee_report.attributes')
            ->where('employees.id', $employeeid)
            ->where('employee_report.report_id', $reportid)
            ->leftJoin('employee_report', 'employee_report.employee_id', '=', 'employees.id')
            ->get();
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
