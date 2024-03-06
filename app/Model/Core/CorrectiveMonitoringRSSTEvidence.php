<?php

namespace App\Model\Core;

use App\Model\Core\CorrectiveMonitoringRSST;

use Illuminate\Database\Eloquent\Model;

class CorrectiveMonitoringRSSTEvidence extends Model
{
    protected $table = 'corrective_monitoring_rsst_evidences';
    protected $fillable = [
        'id',
        'name',
        'file',
        'type',
        'approved',
        'corrective_id'
    ];

    public function inspection()
    {
        return $this->belongsTo(CorrectiveMonitoringRSST::class);
    }
}
