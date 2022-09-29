<?php

namespace App\Query\Abstraction;

use Illuminate\Http\Request;

interface ICommerceQuery {
    public function index();
    public function store(Request $request);
    public function update(Request $request, int $id);
    public function destroy(Int $id);
    public function showByUserId(Request $request, int $id);
    public function showByCommerceId(Request $request, int $id);


}
