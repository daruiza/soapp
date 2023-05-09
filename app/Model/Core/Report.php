<?php

namespace App\Model\Core;

use Carbon\Carbon;
use App\Model\Core\Commerce;
use App\Model\Core\Employee;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $table = 'reports';
    protected $fillable =
    [
        'id',
        'project',
        'progress',
        'description',
        'focus',
        'active',
        'responsible',
        'email_responsible',
        'phone_responsible',
        
        'elaborated',
        'email_elaborated',
        'phone_elaborated',

        'passed',
        'email_passed',
        'phone_passed',
        
        'date',
        'commerce_id',
    ];

    //a varios reportes le Pertenece un comercios
    public function commerce()
    {
        return $this->belongsTo(Commerce::class);
    }

    //a varios reportes le Pertenece varios colaboradores
    public function employee()
    {
        return $this->belongsToMany(Employee::class);
    }

    public function scopeProject($query, $project)
    {
        return is_null($project) ?  $query : $query->where('project', $project);
    }

    public function scopeResponsible($query, $responsible)
    {
        return is_null($responsible) ?  $query : $query->where('responsible', $responsible );
    }

    public function scopeCommerceid($query, $commerceid)
    {
        return is_null($commerceid) ?  $query : $query->where('commerce_id', $commerceid);
    }

    public function scopeDate($query, $year, $month)
    {
        return is_null($year) ?  $query : $query->whereBetween('date', [
            Carbon::create(
                $year,
                $month ?? 1,
                1,
                0,
                0,
                0
            )->toDateTimeString(),
            Carbon::create(
                $year,
                $month ? $month : 12,
                $month ? Carbon::create($year, $month)->endOfMonth()->day : 31, //corregir, ultimo día
                23,
                59,
                59
            )->toDateTimeString()
        ]);
    }
}
