<?php

namespace App\Query\Request;

use App\Model\Core\GeneralList;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use App\Query\Abstraction\IGeneralListQuery;
use Illuminate\Support\Facades\Validator;

class GeneralListQuery implements IGeneralListQuery
{
    public function index(Request $request)
    {
        try {
            $genrallist = GeneralList::query()
                ->select(['id', 'name', 'value'])
                ->get();
            return response()->json([
                'data' => $genrallist,
                'message' => 'Lista Genaral Consulatada Correctamente'
            ], 201);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Algo salio mal!', 'error' => $e->getMessage()], 403);
        }
    }

    public function showById(Request $request,  int $id)
    {
        if ($id) {
            try {
                return response()->json([
                    'data' => [
                        'commerce' => 'genralLista',
                    ],
                    'message' => 'Datos de Tienda Consultados Correctamente!'
                ], 201);
            } catch (ModelNotFoundException $e) {
                return response()->json(['message' => "Tienda con id {$id} no existe!", 'error' => $e->getMessage()], 403);
            }
        }
    }

    public function showByName(Request $request,  int $name)
    {
        if ($name) {
            try {
                $genrallist = GeneralList::name($name)
                ->select(['id', 'name', 'value'])
                ->get();
                return response()->json([
                    'data' => $genrallist,
                    'message' => 'Datos de Tienda Consultados Correctamente!'
                ], 201);
            } catch (ModelNotFoundException $e) {
                return response()->json(['message' => "Tienda con id {$name} no existe!", 'error' => $e->getMessage()], 403);
            }
        }
    }
}
