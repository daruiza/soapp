<?php

namespace App\Model\Core;

use App\Model\Core\Trainingsst;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class TrainingsstEvidence extends Model
{
    protected $table = 'trainingsst_evidences';
    protected $fillable = [
        'id',        
        'name',
        'file',
        'type',
        'approved',
        'trainingsst_id'        
    ];

    public function trainingsst()
    {
        return $this->belongsTo(Trainingsst::class);
    }
}
