<?php

namespace App\Query\Abstraction;

use Illuminate\Http\Request;
use App\Http\Requests\StoreUser;

interface IUserQuery
{
    public function index();
    public function store(Request $request);
    public function update(Request $request, int $id);
    public function showByUserId(Request $request, int $id);
    public function destroy(Int $id);
    public function showByRolId(Request $request, int $id);
}
