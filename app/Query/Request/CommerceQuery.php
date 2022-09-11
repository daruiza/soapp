<?php

namespace App\Query\Request;

use App\User;
use App\Model\Core\Commerce;
use Illuminate\Http\Request;
use App\Query\Abstraction\ICommerceQuery;


class CommerceQuery implements ICommerceQuery
{

    public function index()
    {
        $commerces = Commerce::where('active', 1)->get();
        return $commerces ?
            response()->json($commerces, 200) :
            response()->json(['message' => 'No Commerces!'], 404);
    }

    public function store(Request $request)
    {
        if (auth()->check() && auth()->user()->rol_id == 1) {
            if (Commerce::where('name', $request->input('name'))->first()) {
                return response()->json(['message' => 'Commerce exist!'], 400);
            }

            // Creamos el nuevo comercio
            $commerce = new Commerce();
            $request->request->add(['active' => 1]);
            $newCommerce = $commerce->create($request->input());

            return response()->json(['message' => 'Commerce creado correctamente!'], 201);
        } else {
            return response()->json(['message' => 'No tiene permiso para crear commerce!'], 403);
        }
    }

    public function display(Request $request, String $id)
    {
        $commerce = Commerce::where('name', 'LIKE', $id)->first();
        return $commerce ?
            response()->json($commerce, 200) :
            response()->json(['message' => 'Commerce no exist!'], 404);
    }

    public function showByCommerceId(Request $request, $id)
    {
        if ($id) {
            $commerce = Commerce::findOrFail($id);
            $commerce->user;
            return response()->json(['Commerce' => $commerce], 200);
        }
        return response()->json(['message' => 'Commerce no exist!'], 404);
    }


    public function update(Request $request, Int $id)
    {
        return response()->json(['message' => 'Commerce update!'], 201);
    }

    public function destroy(Int $id)
    {
        if (auth()->check() && auth()->user()->rol_id == 1) {
            if ($id) {
                $commerce = Commerce::findOrFail($id);
                $commerce->delete();
                return response()->json(['message' => 'Commerce destroy!'], 201);
            }else{
                return response()->json(['message' => 'Commerce no existe!'], 403);
            }
        } else {
            return response()->json(['message' => 'No tiene permiso para Eliminar commerce!'], 403);
        }
    }
}
