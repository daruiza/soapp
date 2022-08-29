<?php

namespace App\Query\Abstraction;

use Illuminate\Http\Request;

interface IEmployeeQuery {
    public function index();
    public function store(Request $request);
    public function show(Request $request);
    public function showByCommerce(Request $request);
    public function documentTypes(Request $request);
    public function personTypes(Request $request);
    public function update(Request $request, int $id);
    public function destroy(Int $id);
}
