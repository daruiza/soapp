<?php

namespace App\Query\Abstraction;

use Illuminate\Http\Request;

interface IActivityEvidenceQuery {
    public function index(Request $request);
    public function store(Request $request);
    public function update(Request $request, int $id);
    public function destroy(Int $id);
    public function showByActivityEvidenceId(Request $request, int $id);
    public function showByActivityId(Request $request, int $id);    
}
