<?php

namespace App\Query\Request;

use App\Model\Core\Commerce;
use Illuminate\Http\Request;
use App\Query\Abstraction\ICommerceQuery;


class CommerceQuery implements ICommerceQuery
{
    private $name = 'name';
    private $nit = 'nit';
    private $department = 'department';
    private $city = 'city';
    private $adress = 'adress';
    private $description = 'description';
    private $logo = 'logo';
    private $active = 'active';
    private $user_id = 'user_id';

    public function index()
    {
        try {
            $commerces = Commerce::where('active', 1)
                ->select(['id', 'name', 'nit', 'department', 'city', 'user_id'])
                ->with(['user:id,name,lastname,phone,email'])
                ->get();
            return response()->json([
                'data' => [
                    'commerce' => $commerces,
                ],
                'message' => 'Datos de Tiendas Consultados Correctamente!'
            ], 201);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], 402);
        }
    }

    public function store(Request $request)
    {
        if ((auth()->check() && auth()->user()->rol_id == 1) || (auth()->check() && auth()->user()->rol_id == 3)) {
            if (Commerce::where('name', $request->input('name'))->first()) {
                return response()->json(['message' => 'La tienda ya  existe!'], 400);
            }

            try {
                // Creamos el nuevo comercio
                $commerce = new Commerce();
                $request->request->add(['active' => 1]);
                $request->request->add(['user_id' => 2]);
                $newCommerce = $commerce->create($request->input());

                return response()->json([
                    'data' => [
                        'commerce' => $newCommerce,
                    ],
                    'message' => 'Tienda creada correctamente!'
                ], 201);
            } catch (\Exception $e) {
                return response()->json(['message' => 'Algo salio mal!', 'error' => $e->getMessage()], 403);
            }
        } else {
            return response()->json(['message' => 'No tiene permiso para crear tienda!'], 403);
        }
    }

    public function showByUserId(Request $request, String $id)
    {
        if ($id) {
            try {
                $commerce = Commerce::where('user_id', '=', $id)->first();
                return response()->json([
                    'data' => [
                        'commerce' => $commerce,
                    ],
                    'message' => 'Datos de Tienda Consultados Correctamente!'
                ], 201);
            } catch (\Exception $e) {
                return response()->json(['message' => 'Tienda no existe!', 'error' => $e->getMessage()], 403);
            }
        }
    }

    public function showByCommerceId(Request $request, $id)
    {
        if ($id) {
            try {
                $commerce = Commerce::findOrFail($id);
                $commerce->user;
                return response()->json([
                    'data' => [
                        'commerce' => $commerce,
                    ],
                    'message' => 'Datos de Tienda Consultados Correctamente!'
                ], 201);
            } catch (\Exception $e) {
                return response()->json(['message' => 'Tienda no existe!', 'error' => $e->getMessage()], 403);
            }
        }
    }


    public function update(Request $request, Int $id)
    {
        if ($id) {
            try {
                $commerce = Commerce::findOrFail($id);
                $request->validate([
                    $this->name     => 'required|string|min:0|max:128',
                ]);
                $commerce->name = $request->name ?? $commerce->name;
                $commerce->nit = $request->nit ?? $commerce->nit;
                $commerce->department = $request->department ?? $commerce->department;
                $commerce->city = $request->city ?? $commerce->city;
                $commerce->adress = $request->adress ?? $commerce->adress;
                $commerce->description = $request->description ?? $commerce->description;
                $commerce->logo = $request->logo ?? $commerce->logo;
                $commerce->active = $request->active ?? $commerce->active;
                $commerce->user_id = $request->user_id ?? $commerce->user_id;
                $commerce->save();
                return response()->json([
                    'data' => [
                        'commerce' => $commerce,
                    ],
                    'message' => 'Negocio actualizada con éxito!'
                ], 201);
            } catch (\Exception $e) {
                return response()->json(['message' => 'Negocio no existe!', 'error' => $e->getMessage()], 403);
            }
        } else {
            return response()->json(['message' => 'No  se ha suministrado un Id de Negocio!'], 403);
        }
    }

    public function destroy(Int $id)
    {
        if (auth()->check() && auth()->user()->rol_id == 1) {

            if ($id) {
                try {
                    $commerce = Commerce::findOrFail($id);
                    $commerce->delete();
                    return response()->json([
                        'data' => [
                            'user' => $commerce,
                        ],
                        'message' => 'Tienda eliminada con éxito!'
                    ], 201);
                } catch (\Exception $e) {
                    return response()->json(['message' => 'Tienda no existe!', 'error' => $e->getMessage()], 403);
                }
            }
        } else {
            return response()->json(['message' => 'Necesita permisos de super-administrador!'], 403);
        }
    }
}
