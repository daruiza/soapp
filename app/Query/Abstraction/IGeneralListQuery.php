<?php

namespace App\Query\Abstraction;

use Illuminate\Http\Request;

interface IGeneralListQuery
{
    public function index(Request $request);
    public function showById(Request $request, int $id);
    public function showByName(Request $request, int $name);
}
