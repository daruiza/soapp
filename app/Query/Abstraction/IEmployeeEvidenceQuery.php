<?php

namespace App\Query\Abstraction;

use Illuminate\Http\Request;

interface IEmployeeEvidenceQuery {
    public function index(Request $request);
    public function store(Request $request);
    public function update(Request $request, int $id);
    public function destroy(Int $id);
    public function showByEmployeeEvidenceId(Request $request, int $id);
    public function showByEmployeeReportId(Request $request, int $id);    
}
