<?php

namespace App\Query\Abstraction;

use Illuminate\Http\Request;

interface IEquipementMaintenanceEvidenceQuery
{
    public function store(Request $request);
    public function update(Request $request, int $id);
    public function destroy(Int $id);
    public function showByEquipementMaintenanceEvidenceId(Request $request, int $id);
    public function showByEquipementMaintenanceId(Request $request, int $id);
}
