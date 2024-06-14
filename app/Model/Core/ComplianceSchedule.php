<?php

namespace App\Model\Core;

use Illuminate\Database\Eloquent\Model;
use App\Model\Core\Report;
use App\Model\Core\ComplianceScheduleEvidence;
use Illuminate\Support\Facades\DB;

class ComplianceSchedule extends Model
{
    protected $table = 'compliance_schedule';
    protected $fillable = [
        'id',
        'company',
        'planned_activities',
        'executed_activities',
        'compliance',
        'approved',
        'report_id'        
    ]; 
    
    //a varias capacitacions pertenecesn a un reporte
    public function report()
    {
        return $this->belongsTo(Report::class);
    }

    public function compliance_schedule_evidences()
    {
        return $this->hasMany(ComplianceScheduleEvidence::class);
    }    

    public function scopeReportid($query, $report_id)
    {
        return is_null($report_id) ?  $query : $query->where('report_id', $report_id );
    }
   
}
