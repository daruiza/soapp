<?php

namespace App\Model\Core;

use App\Model\Core\SupportGroupActivity;

use Illuminate\Database\Eloquent\Model;

class SupportGroupActivityEvidence extends Model
{
    protected $table = 'support_group_activities_evidence';
    protected $fillable = [
        'id',
        'name',
        'file',
        'type',
        'approved',
        'support_group_id'
    ];

    public function support_group_activities()
    {
        return $this->belongsTo(SupportGroupActivity::class);
    }
}
