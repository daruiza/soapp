<?php

namespace App\Model\Core;

use Illuminate\Database\Eloquent\Model;
use App\Model\Core\Report;
use App\Model\Core\CopromiseEvidence;

class Compromise extends Model
{
    protected $table = 'compromises';
    protected $fillable = [
        'id',
        'item',
        'rule',
        'name',
        'detail',
        'canon',
        'dateinit',
        'dateclose',
        'report_id'        
    ]; 
    
    //a varias capacitacions pertenecesn a un reporte
    public function report()
    {
        return $this->belongsTo(Report::class);
    }

    public function compromise_evidences()
    {
        return $this->hasMany(CopromiseEvidence::class);
    }    

    public function scopeReportid($query, $report_id)
    {
        return is_null($report_id) ?  $query : $query->where('report_id', $report_id );
    }
   
}
