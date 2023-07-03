<?php

namespace App\Model\Core;

use Illuminate\Database\Eloquent\Model;
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
        'report_id'        
    ];    

    public function scopeTopic($query, $topic)
    {
        return is_null($topic) ?  $query : $query->where('topic', 'LIKE',  $topic );
    }

    public function scopeReportid($query, $report_id)
    {
        return is_null($report_id) ?  $query : $query->where('report_id', $report_id );
    }
   
}
