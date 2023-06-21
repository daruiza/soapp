<?php

namespace App\Query\Request;

use App\Model\Core\GeneralList;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Query\Abstraction\IGeneralListQuery;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class GeneralListQuery implements IGeneralListQuery
{
    private $name = 'name';
    private $value = 'value';

    public function index(Request $request)
    {
        try {
            $generallist = GeneralList::query()
                ->select(['id', 'name', 'value', 'index'])
                ->orderBy('name', $request->sort ?? 'ASC')
                ->get();

            return response()->json([
                'data' => [
                    'generallist' => $generallist,
                ],
                'message' => 'Datos de lista general Consultados Correctamente!'
            ], 201);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Algo salio mal!', 'error' => $e->getMessage()], 403);
        }
    }

    public function showById(Request $request,  int $id)
    {
        try {
            $gl = GeneralList::findOrFail($id);
            if ($gl) {
                $generallist = DB::table('general_lists')
                    ->select(['id', 'name', 'value', 'index'])
                    ->where('general_lists.id', '=', $id)
                    ->get();
                return response()->json([
                    'data' => [
                        'generallist' => $generallist,
                    ],
                    'message' => 'Datos de lista general Consultados Correctamente!'
                ]);
            }
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => "Lista general con id {$id} no existe!", 'error' => $e->getMessage()], 403);
        }
    }

    public function showByName(Request $request)
    {
        if ($request->name) {
            try {
                $generallist = GeneralList::query()
                    ->select(['id', 'name', 'value', 'index'])
                    ->name($request->name)
                    ->get();
                return response()->json([
                    'data' => [
                        'generallist' => $generallist,
                    ],
                    'message' => 'Datos de lista general Consultados Correctamente!'
                ], 201);
            } catch (\Exception $e) {
                return response()->json(['message' => 'Algo salio mal!', 'error' => $e->getMessage()], 403);
            }
        }
    }

    public function showByNameList(Request $request)
    {
        if ($request->name) {
            try {
                $generallist = GeneralList::query()
                    ->select(['id', 'name', 'value', 'index'])
                    ->where(function ($orquery) use ($request) {
                        if (isset($request->name)) {
                            foreach (explode(",", $request->name) as $value) {
                                $orquery->orWhere(
                                    'name',
                                    'LIKE',
                                    $value
                                );
                            }
                        }
                        $orquery;
                    })                    
                    //->toSql();
                    ->get();
                return response()->json([
                    'data' => [
                        'generallist' => $generallist,
                    ],
                    'message' => 'Datos de lista general Consultados Correctamente!'
                ], 201);
            } catch (\Exception $e) {
                return response()->json(['message' => 'Algo salio mal!', 'error' => $e->getMessage()], 403);
            }
        }
    }

    public function store(Request $request)
    {
        $rules = [
            $this->name    => 'required|string|min:1|max:128|',
            $this->value   => 'required|string|min:1|max:128|',
        ];
        try {
            // Ejecutamos el validador y en caso de que falle devolvemos la respuesta
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                throw (new ValidationException($validator->errors()->getMessages()));
            }
            // Creamos el nuevo colaborador
            $generallist = new GeneralList();
            $newGeneralList = $generallist->create($request->input());

            return response()->json([
                'data' => [
                    'generallist' => $newGeneralList,
                ],
                'message' => 'Lista general creada correctamente!'
            ], 201);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Algo salio mal!', 'error' => $e], 403);
        }
    }

    public function destroy(Int $id)
    {
        if (auth()->check() && auth()->user()->rol_id == 1) {

            if ($id) {
                try {
                    $generallist = GeneralList::findOrFail($id);
                    $generallist->delete();

                    return response()->json([
                        'data' => [
                            'generallist' => $generallist,
                        ],
                        'message' => 'Lista general eliminada con éxito!'
                    ], 201);
                } catch (ModelNotFoundException $e) {
                    return response()->json(['message' => "Lista general con id {$id} no existe!", 'error' => $e->getMessage()], 403);
                }
            }
        } else {
            return response()->json(['message' => 'Necesita permisos de super-administrador!'], 403);
        }
    }

    public function update(Request $request, int $id)
    {
        if ($id) {
            try {
                $generallist = GeneralList::findOrFail($id);
                $rules = [
                    $this->name    => 'required|string|min:1|max:128|',
                    $this->value   => 'required|string|min:1|max:128|',
                ];
                $validator = Validator::make($request->all(), $rules);
                if ($validator->fails()) {
                    throw (new ValidationException($validator->errors()->getMessages()));
                }
                $generallist->name = $request->name;
                $generallist->value = $request->value ?? $generallist->value;
                $generallist->save();

                return response()->json([
                    'data' => [
                        'generallist' => $generallist,
                    ],
                    'message' => 'Lista general actualizada con éxito!'
                ], 201);
            } catch (ModelNotFoundException $ex) {
                return response()->json(['message' => "Lista General con id {$id} no existe!", 'error' => $ex->getMessage()], 404);
            } catch (\Exception $e) {
                return response()->json(['message' => 'Algo salio mal!', 'error' => $e], 403);
            }
        }
    }
}
