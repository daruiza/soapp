<?php

namespace App\Model\Core;

use App\Model\Core\CompromiseRSST;

use Illuminate\Database\Eloquent\Model;

class CompromiseRSSTEvidence extends Model
{
    protected $table = 'compromise_rsst_evidences';
    protected $fillable = [
        'id',        
        'name',
        'file',
        'type',
        'approved',
        'compromise_id'        
    ];

    public function compromise()
    {
        return $this->belongsTo(CompromiseRSST::class);
    }
}