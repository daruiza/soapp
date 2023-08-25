<?php

namespace App\Query\Abstraction;

use Illuminate\Http\Request;

interface ICompromiseQuery {
    public function index(Request $request);
    public function store(Request $request);
    public function update(Request $request, int $id);
    public function destroy(Int $id);  
    public function showByReportId(Request $request, int $id);      
}
