<?php

namespace App\Query\Abstraction;

use Illuminate\Http\Request;

interface ICorrectiveMonitoringRSSTEvidenceQuery {
    public function store(Request $request);
    public function update(Request $request, int $id);
    public function destroy(Int $id);
    public function showByInspectionEvidenceId(Request $request, int $id);
    public function showByInspectionId(Request $request, int $id);    
}
