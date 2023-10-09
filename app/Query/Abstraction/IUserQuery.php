<?php

namespace App\Query\Abstraction;

use Illuminate\Http\Request;

interface IUserQuery
{
    public function index(Request $request);
    public function store(Request $request);
    public function update(Request $request);
    public function updateById(Request $request, int $id);
    public function showByUserId(Request $request, int $id);
    public function destroy(int $id);
    public function showByRolId(Request $request, int $id);
}
