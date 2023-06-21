<?php

namespace App\Query\Abstraction;

use Illuminate\Http\Request;

interface IGeneralListQuery
{
    public function index(Request $request);
    public function showById(Request $request, int $id);
    public function showByName(Request $request);
    public function showByNameList(Request $request);
    public function store(Request $request);
    public function destroy(Int $id);
    public function update(Request $request, int $id);
}
