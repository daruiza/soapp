<?php

namespace App\Query\Abstraction;

use Illuminate\Http\Request;

interface ITrainingsstEvidenceQuery {
    public function index(Request $request);
    public function store(Request $request);
    public function update(Request $request, int $id);
    public function destroy(Int $id);
    public function showByTrainingsstEvidenceId(Request $request, int $id);
    public function showByTrainigsstId(Request $request, int $id);    
}
