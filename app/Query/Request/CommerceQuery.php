<?php

namespace App\Query\Request;

use App\Model\Core\Commerce;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\Query\Abstraction\ICommerceQuery;


class CommerceQuery implements ICommerceQuery
{
    public function index()
    {
        try {
            $commerces = Commerce::where('active', 1)
                ->select(['id', 'name', 'nit', 'department', 'city', 'user_id'])
                ->with(['user:id,name,lastname,phone,email'])
                ->get();
            return response()->json([
                'data' => [
                    'Commerce' => $commerces,
                ],
                'message' => 'Datos de Tiendas Consultados Correctamente!'
            ]);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], 402);
        }
    }

    public function store(Request $request)
    {
        if ((auth()->check() && auth()->user()->rol_id == 1) || (auth()->check() && auth()->user()->rol_id == 3)) {
            /* if (Commerce::where('name', $request->input('name'))->first()) {
                return response()->json(['message' => 'La tienda ya  existe!'], 400);
            } */
            // Creamos las reglas de validación
            $rules = [
                'name'  => 'required|string|min:5|max:128|unique:commerces|',
                'nit'   => 'required|unique:commerces|'
            ];
            try {
                // Ejecutamos el validador y en caso de que falle devolvemos la respuesta
                $validator = Validator::make($request->all(), $rules);
                if ($validator->fails()) {
                    return response()->json([
                        'data' => [
                            'created' => false,
                            'errors'  => $validator->errors()->all()
                        ],
                        'message' => 'Los datos ingresados no son validos!'
                    ], 500);
                }
                // Creamos el nuevo comercio
                $commerce = new Commerce();
                $request->request->add(['active' => 1]);
                $request->request->add(['user_id' => 2]);
                $newCommerce = $commerce->create($request->input());

                return response()->json([
                    'data' => [
                        'Commerce' => $newCommerce,
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

    public function update(Request $request, Int $id)
    {
        if ((auth()->check() && auth()->user()->rol_id == 1) || (auth()->check() && auth()->user()->rol_id == 3)) {


            if ($id) {
                $commerce = Commerce::findOrFail($id);
                // Creamos las reglas de validación
                $rules = [
                    'name'    => 'required|string|min:5|max:128|', Rule::unique('commerces')->ignore($commerce->id),
                    'nit'     => 'required|', Rule::unique('commerces')->ignore($commerce->id),
                ];
                try {
                    // Ejecutamos el validador y en caso de que falle devolvemos la respuesta
                    $validator = Validator::make($request->all(), $rules);
                    if ($validator->fails()) {
                        return [
                            'created' => false,
                            'errors'  => $validator->errors()->all()
                        ];
                    }
                    // Actualizamos el comercio
                    $commerce = Commerce::findOrFail($id);
                    $commerce->fill($request->all());
                    $commerce->user_id = $request->user_id = 2;
                    $commerce->save();
                    return response()->json([
                        'data' => [
                            'commerce' => $commerce,
                        ],
                        'message' => 'Tienda actualizada con éxito!'
                    ], 201);
                } catch (\Exception $e) {
                    return response()->json(['message' => 'Algo salio mal!', 'error' => $e->getMessage()], 403);
                }
            } else {
                return response()->json(['message' => 'No tiene permiso para crear tienda!'], 403);
            }
        }
    }

    public function showByUserId(Request $request,  int $id)
    {
        if ($id) {
            try {
                $commerce = Commerce::where('user_id', '=', $id)->first();
                return response()->json([
                    'data' => [
                        'Commerce' => $commerce,
                    ],
                    'message' => 'Datos de Tienda Consultados Correctamente!'
                ]);
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
                        'Commerce' => $commerce,
                    ],
                    'message' => 'Datos de Tienda Consultados Correctamente!'
                ]);
            } catch (\Exception $e) {
                return response()->json(['message' => 'Tienda no existe!', 'error' => $e->getMessage()], 403);
            }
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
