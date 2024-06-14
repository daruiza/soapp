<?php

namespace App\Model\Core;

use App\Model\Core\Compromise;

use Illuminate\Database\Eloquent\Model;

class CompromiseEvidence extends Model
{
    protected $table = 'compromise_evidences';
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
        return $this->belongsTo(Compromise::class);
    }
}