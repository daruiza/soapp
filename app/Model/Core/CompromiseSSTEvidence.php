<?php

namespace App\Model\Core;

use App\Model\Core\CompromiseSST;

use Illuminate\Database\Eloquent\Model;

class CompromiseSSTEvidence extends Model
{
    protected $table = 'compromise_sst_evidences';
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
        return $this->belongsTo(CompromiseSST::class);
    }
}