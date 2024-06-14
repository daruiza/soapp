<?php

namespace App\Model\Core;

use App\Model\Core\ComplianceSchedule;

use Illuminate\Database\Eloquent\Model;

class ComplianceScheduleEvidence extends Model
{
    protected $table = 'compliance_schedule_evidence';
    protected $fillable = [
        'id',
        'name',
        'file',
        'type',
        'approved',
        'compliance_schedule_id'
    ];

    public function inspection()
    {
        return $this->belongsTo(ComplianceSchedule::class);
    }
}
