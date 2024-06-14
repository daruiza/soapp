<?php

namespace App\Model\Core;

use App\Model\Core\Activity;

use Illuminate\Database\Eloquent\Model;

class ActivityEvidence extends Model
{
    protected $table = 'activity_evidences';
    protected $fillable = [
        'id',        
        'name',
        'file',
        'type',
        'approved',
        'activity_id'        
    ];

    public function activity()
    {
        return $this->belongsTo(Activity::class);
    }
}