<?php

namespace App\Query\Abstraction;

use Illuminate\Http\Request;

interface ICommerceQuery {    
    public function index();
    public function show(Request $request);
    public function store(Request $request);
    public function update(Request $request, int $id);
    public function destroy(Int $id);
    public function display(Request $request, String $id);
}