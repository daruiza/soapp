<?php

namespace App\Query\Request;

use Illuminate\Http\Request;
use App\Query\Abstraction\IEmployeeQuery;

class EmployeeQuery implements IEmployeeQuery
{
    public function index()
    {
        return response()->json([
            'data' => [
                'employee' => 'aqui va la data de empleados',
            ],
            'message' => 'Datos de empleados Consultados Correctamente!!'
        ], 200);
    }

    public function store(Request $request)
    {
        return response()->json([
            'data' => [
                'employee' => 'aqui va la data de empleados',
            ],
            'message' => 'Datos de empleados creados Correctamente!!'
        ], 200);
    }

    public function update(Request $request, int $id)
    {
        return response()->json([
            'data' => [
                'employee' => 'aqui va la data de empleados',
            ],
            'message' => 'Datos de empleados actualizados Correctamente!!'
        ], 200);
    }

    public function destroy(Int $id)
    {
        return response()->json([
            'data' => [
                'employee' => 'aqui va la data de empleados',
            ],
            'message' => 'Datos de empleados eliminados Correctamente!!'
        ], 200);
    }
    public function showByEmployeeId(Request $request, int $id)
    {
        return response()->json([
            'data' => [
                'employee' => 'aqui va la data de empleados',
            ],
            'message' => 'Datos de empleados mostrados por Id Correctamente!!'
        ], 200);
    }
}
