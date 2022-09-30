<?php

namespace App\Query\Abstraction;

use Illuminate\Http\Request;

interface IEmployeeQuery
{
    public function index();
    public function store(Request $request);
    public function update(Request $request, int $id);
    public function destroy(Int $id);
    public function showByEmployeeId(Request $request, int $id);
}
