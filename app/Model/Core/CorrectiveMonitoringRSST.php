<?php

namespace App\Model\Core;

use Illuminate\Database\Eloquent\Model;
use App\Model\Core\Report;
use App\Model\Core\CorrectiveMonitoringRSSTEvidence;

class CorrectiveMonitoringRSST extends Model
{
    protected $table = 'corrective_monitoring_rsst';
    protected $fillable = [
        'id',
        'work',
        'corrective_action',
        'date',
        'executed',
        'observations',
        'approved',
        'report_id',
    ];

    //a varias capacitacions pertenecesn a un reporte
    public function report()
    {
        return $this->belongsTo(Report::class);
    }

    public function corrective_monitoring_evidences()
    {
        return $this->hasMany(CorrectiveMonitoringRSSTEvidence::class);
    }

    public function scopeReportid($query, $report_id)
    {
        return is_null($report_id) ?  $query : $query->where('report_id', $report_id);
    }
}
