<?php

namespace App\Query\Abstraction;

use Illuminate\Http\Request;

interface ICompromiseSSTEvidenceQuery {
    public function index(Request $request);
    public function store(Request $request);
    public function update(Request $request, int $id);
    public function destroy(Int $id);
    public function showByCompromiseEvidenceId(Request $request, int $id);
    public function showByCompromiseId(Request $request, int $id);    
}
