<?php

namespace App\Model\Core;

use App\Model\Core\WorkManagement;

use Illuminate\Database\Eloquent\Model;

class WorkManagementEvidence extends Model
{
    protected $table = 'work_management_evidence';
    protected $fillable = [
        'id',
        'name',
        'file',
        'type',
        'approved',
        'work_management_id'
    ];

    public function work_management()
    {
        return $this->belongsTo(WorkManagement::class);
    }
}
