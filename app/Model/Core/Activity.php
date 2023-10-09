<?php

namespace App\Model\Core;

use Illuminate\Database\Eloquent\Model;
use App\Model\Core\Report;
use App\Model\Core\ActivityEvidence;
use Illuminate\Support\Facades\DB;

class Activity extends Model
{
    protected $table = 'activities';
    protected $fillable = [
        'id',
        'activity',
        'date',
        'approved',
        'report_id'
    ];

    //a varias capacitacions pertenecesn a un reporte
    public function report()
    {
        return $this->belongsTo(Report::class);
    }

    public function activity_evidences()
    {
        return $this->hasMany(ActivityEvidence::class);
    }

    public function scopeReportid($query, $report_id)
    {
        return is_null($report_id) ?  $query : $query->where('report_id', $report_id);
    }
}
