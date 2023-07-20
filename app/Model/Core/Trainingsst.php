<?php

namespace App\Model\Core;

use Illuminate\Database\Eloquent\Model;
use App\Model\Core\Report;
use App\Model\Core\TrainingsstEvidence;
use Illuminate\Support\Facades\DB;

class Trainingsst extends Model
{
    protected $table = 'trainingsst';
    protected $fillable = [
        'id',
        'topic',
        'date',
        'hours',
        'assistants',
        'approved',
        'report_id'        
    ]; 
    
    //a varias capacitacions pertenecesn a un reporte
    public function report()
    {
        return $this->belongsTo(Report::class);
    }

    public function trainingsst_evidence()
    {
        return $this->hasMany(TrainingsstEvidence::class);
    }

    public function scopeTopic($query, $topic)
    {
        return is_null($topic) ?  $query : $query->where('topic', 'LIKE',  $topic );
    }

    public function scopeReportid($query, $report_id)
    {
        return is_null($report_id) ?  $query : $query->where('report_id', $report_id );
    }
   
}
