<?php

namespace App\Query\Request;

use Illuminate\Http\Request;
use App\Query\Abstraction\IEmployeeQuery;

class EmployeeQuery implements IEmployeeQuery
{
    public function index()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function update(Request $request, int $id)
    {
        //
    }

    public function destroy(Int $id)
    {
        //
    }
}
