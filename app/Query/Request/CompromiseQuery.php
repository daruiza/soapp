<?php

namespace App\Query\Request;

use Illuminate\Http\Request;
use App\Query\Abstraction\ICompromiseQuery;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\ModelNotFoundException;

use Illuminate\Validation\ValidationException;
use App\Model\Core\Compromise;

class CompromiseQuery implements ICompromiseQuery
{

    private $item = 'item';
    private $name = 'name';
    private $rule = 'rule';
    private $detail = 'detail';
    private $canon = 'canon';
    private $approved = 'approved';
    private $dateinit = 'dateinit';
    private $dateclosee = 'dateclose';
    private $report_id = 'report_id';

    public function index(Request $request)
    {
        return response()->json([
            'data' => Compromise::all(),
            'message' => 'Compromisos Consultadas correctamente'
        ], 200);
    }

    public function store(Request $request)
    {
        $rules = [
            $this->item        => 'required|string',
            $this->rule        => 'required|string',
            $this->name         => 'required|string',
            $this->report_id    => 'required|numeric',
        ];

        try {
            // Ejecutamos el validador y en caso de que falle devolvemos la respuesta
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                throw (new ValidationException($validator->errors()->getMessages()));
            }

            $Compromise = new Compromise();
            $newCompromise = $Compromise->create($request->input());

            return response()->json([
                'data' => [
                    'compromise' => $newCompromise,
                ],
                'message' => 'Compromiso creadó correctamente!'
            ], 201);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Algo salio mal!', 'error' => $e], 403);
        }
    }

    public function update(Request $request, int $id)
    {
        if ($id) {
            try {
                $Compromise = Compromise::findOrFail($id);
                if (auth()->check()) {
                    $rules = [
                        $this->item        => 'required|string',
                        $this->rule        => 'required|string',
                        $this->name         => 'required|string',
                        $this->report_id    => 'required|numeric',
                    ];
                    $validator = Validator::make($request->all(), $rules);
                    if ($validator->fails()) {
                        throw (new ValidationException($validator->errors()->getMessages()));
                    }

                    $Compromise->item = $request->item ?? $Compromise->item;
                    $Compromise->name = $request->name ?? $Compromise->name;
                    $Compromise->rule = $request->rule ?? $Compromise->rule;
                    $Compromise->detail = $request->detail ?? $Compromise->detail;
                    $Compromise->canon = $request->canon ?? $Compromise->canon;
                    $Compromise->approved = $request->approved ?? $Compromise->approved;
                    $Compromise->dateinit = $request->dateinit ?? $Compromise->dateinit;
                    $Compromise->dateclose = $request->dateclose ?? $Compromise->dateclose;
                    $Compromise->report_id = $request->report_id ?? $Compromise->report_id;

                    $Compromise->save();
                    return response()->json([
                        'data' => [
                            'compromise' => $Compromise,
                        ],
                        'message' => 'Compromiso actualizada con éxito!'
                    ], 201);
                }
            } catch (ModelNotFoundException $ex) {
                return response()->json(['message' => "Compromiso con id {$id} no existe!", 'error' => $ex->getMessage()], 404);
            } catch (\Exception $e) {
                return response()->json(['message' => 'Algo salio mal!', 'error' => $e], 403);
            }
        }
        return response()->json(['message' => "Compromiso con id {$id} no existe!", 'error' => 'No se suministrado un id valido'], 404);
    }

    public function destroy(int $id)
    {
        if ($id) {
            try {
                $Compromise = Compromise::findOrFail($id);
                $Compromise->delete();
                return response()->json([
                    'data' => [
                        'activity' => $Compromise,
                    ],
                    'message' => 'Compromiso eliminada exitosamente!'
                ], 201);
            } catch (ModelNotFoundException $e) {
                return response()->json(['message' => "Compromiso con id {$id} no existe!", 'error' => $e->getMessage()], 403);
            }
        }
        return response()->json(['message' => "Compromiso con id {$id} no existe!", 'error' => 'No se suministrado un id valido'], 404);
    }

    public function showByReportId(Request $request, int $id)
    {
        if ($id) {
            try {

                return response()->json([
                    //'data' => Activity::where('report_id',$id)->get(),
                    'data' => Compromise::query()->reportid($id)->get(),
                    'message' => 'Capacitaciónes Consultadas correctamente'
                ], 200);
            } catch (ModelNotFoundException $e) {
                return response()->json(['message' => "Compromiso con id {$id} no existe!", 'error' => $e->getMessage()], 403);
            }
        }
        return response()->json(['message' => "Compromiso con id {$id} no existe!", 'error' => 'No se suministrado un id valido'], 404);
    }
}
