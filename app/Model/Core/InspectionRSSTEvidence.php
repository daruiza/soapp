<?php

namespace App\Model\Core;

use App\Model\Core\InspectionRSST;

use Illuminate\Database\Eloquent\Model;

class InspectionRSSTEvidence extends Model
{
    protected $table = 'inspection_rsst_evidences';
    protected $fillable = [
        'id',
        'name',
        'file',
        'type',
        'approved',
        'inspection_id'
    ];

    public function inspection()
    {
        return $this->belongsTo(InspectionRSST::class);
    }
}
