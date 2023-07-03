<?php

namespace App\Query\Request;

use App\Model\Admin\Rol;
use Illuminate\Http\Request;
use App\Query\Abstraction\IRolQuery;
use Illuminate\Support\Facades\Validator;

class RolQuery implements IRolQuery
{
    public function index(Request $request)
    {
        try {
            $rol = Rol::idRol(1)
                ->select(['id', 'name', 'description'])
                ->get();
            return response()->json([
                'data' => $rol,
                'message' => 'Roles Consulatados Correctamente'
            ], 201);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Algo salio mal!', 'error' => $e->getMessage()], 403);
        }
    }
}
