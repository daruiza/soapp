<?php

namespace App\Query\Abstraction;

use Illuminate\Http\Request;

interface IComplianceScheduleEvidenceQuery {
    public function index(Request $request);
    public function store(Request $request);
    public function update(Request $request, int $id);
    public function destroy(Int $id);
    public function showByComplianceScheduleEvidenceId(Request $request, int $id);
    public function showByComplianceScheduleId(Request $request, int $id);    
}
