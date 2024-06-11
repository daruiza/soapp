<?php

namespace App\Query\Request;

use Illuminate\Http\Request;
use App\Query\Abstraction\IEquipementMaintenanceQuery;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\ModelNotFoundException;

use Illuminate\Validation\ValidationException;
use App\Model\Core\EquipementMaintenance;

use App\Model\Core\Report;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;

class EquipementMaintenanceQuery implements IEquipementMaintenanceQuery
{

    private  $buildings = 'buildings';
    private  $tools = 'tools';
    private  $teams = 'teams';
    private  $date = 'date';
    private  $observations = 'observations';
    private  $approved = 'approved';
    private  $report_id = 'report_id';

    public function index(Request $request)
    {
        return response()->json([
            'data' => EquipementMaintenance::all(),
            'message' => 'Equipos consultados correctamente'
        ], 200);
    }

    public function store(Request $request)
    {
        $rules = [
            $this->report_id    => 'required|numeric',
        ];

        try {
            // Ejecutamos el validador y en caso de que falle devolvemos la respuesta
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                throw new ValidationException($validator->errors()->getMessages());
            }

            $equipementmaintenence = new EquipementMaintenance();
            $newequipementmaintenence = $equipementmaintenence->create($request->input());

            return response()->json([
                'data' => [
                    'equipementmaintenance' => $newequipementmaintenence,
                ],
                'message' => 'Equipo creadó correctamente!'
            ], 201);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Algo salio mal!', 'error' => $e], 403);
        }
    }

    public function update(Request $request, int $id)
    {
        if ($id) {
            try {
                $equipementmaintenence = EquipementMaintenance::findOrFail($id);
                if (auth()->check()) {
                    $rules = [
                        $this->report_id    => 'required|numeric',
                    ];
                    $validator = Validator::make($request->all(), $rules);
                    if ($validator->fails()) {
                        throw new ValidationException($validator->errors()->getMessages());
                    }

                    $equipementmaintenence->buildings = $request->buildings ?? $equipementmaintenence->buildings;
                    $equipementmaintenence->tools = $request->tools ?? $equipementmaintenence->tools;
                    $equipementmaintenence->teams = $request->teams ?? $equipementmaintenence->teams;
                    $equipementmaintenence->date = $request->date ?? $equipementmaintenence->date;
                    $equipementmaintenence->observations = $request->observations ?? $equipementmaintenence->observations;
                    $equipementmaintenence->approved = $request->approved ?? $equipementmaintenence->approved;
                    $equipementmaintenence->report_id = $request->report_id ?? $equipementmaintenence->report_id;

                    $equipementmaintenence->save();
                    return response()->json([
                        'data' => [
                            'equipementmaintenance' => $equipementmaintenence,
                        ],
                        'message' => 'Equipo actualizado con éxito!'
                    ], 201);
                }
            } catch (ModelNotFoundException $ex) {
                return response()->json(['message' => "Equipo con id {$id} no existe!", 'error' => $ex->getMessage()], 404);
            } catch (\Exception $e) {
                return response()->json(['message' => 'Algo salio mal!', 'error' => $e], 403);
            }
        }
        return response()->json(['message' => "Equipo  con id {$id} no existe!", 'error' => 'No se suministrado un id valido'], 404);
    }

    public function destroy(int $id)
    {
        if ($id) {
            try {
                $equipementmaintenence = EquipementMaintenance::findOrFail($id);

                $report = Report::findOrFail($equipementmaintenence->report_id);
                $path = "commerce/{$report->commerce_id}/report/{$report->id}/equipementmaintenance/{$equipementmaintenence->id}";

                // LLamado de delete de UploadQuery
                $request = new Request();
                $request->setMethod('DELETE');
                $request->request->add(['path' => $path]);
                UploadQuery::deleteFile($request);

                $equipementmaintenence->delete();
                return response()->json([
                    'data' => [
                        'equipementmaintenance' => $equipementmaintenence,
                    ],
                    'message' => 'Equipo  eliminada exitosamente!'
                ], 201);
            } catch (ModelNotFoundException $e) {
                return response()->json(['message' => "Equipo con id {$id} no existe!", 'error' => $e->getMessage()], 403);
            }
        }
        return response()->json(['message' => "Equipo con id {$id} no existe!", 'error' => 'No se suministrado un id valido'], 404);
    }

    public function showByReportId(Request $request, int $id)
    {
        if ($id) {
            try {

                return response()->json([
                    'data' => EquipementMaintenance::query()->reportid($id)->get(),
                    'message' => 'Equipos consultados correctamente'
                ], 200);
            } catch (ModelNotFoundException $e) {
                return response()->json(['message' => "Equipo con id {$id} no existe!", 'error' => $e->getMessage()], 403);
            }
        }
        return response()->json(['message' => "Equipo con id {$id} no existe!", 'error' => 'No se suministrado un id valido'], 404);
    }
}
