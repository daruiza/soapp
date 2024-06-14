<?php

namespace App\Model\Core;

use App\Model\Core\EquipementMaintenance;

use Illuminate\Database\Eloquent\Model;

class EquipementMaintenanceEvidence extends Model
{
    protected $table = 'equipement_maintenance_evidence';
    protected $fillable = [
        'id',
        'name',
        'file',
        'type',
        'approved',
        'equipement_id'
    ];

    public function equipement_maintenance()
    {
        return $this->belongsTo(EquipementMaintenance::class);
    }
}
