<?php

namespace App\Query\Request;

use Illuminate\Http\Request;
use App\Query\Abstraction\ICorrectiveMonitoringRSSTQuery;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\ModelNotFoundException;

use Illuminate\Validation\ValidationException;
use App\Model\Core\CorrectiveMonitoringRSST;

use App\Model\Core\Report;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;

class CorrectiveMonitoringRSSTQuery implements ICorrectiveMonitoringRSSTQuery
{

    private  $work = 'work';
    private  $corrective_action = 'corrective_action';
    private  $date = 'date';
    private  $executed = 'executed';
    private  $observations = 'observations';
    private $approved = 'approved';
    private $report_id = 'report_id';

    public function index(Request $request)
    {
        return response()->json([
            'data' => CorrectiveMonitoringRSST::all(),
            'message' => 'Correcciones Consultadas correctamente'
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

            $correctiversst = new CorrectiveMonitoringRSST();
            $newCorrectionSST = $correctiversst->create($request->input());

            return response()->json([
                'data' => [
                    'corrective' => $newCorrectionSST,
                ],
                'message' => 'Corrección creadó correctamente!'
            ], 201);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Algo salio mal!', 'error' => $e], 403);
        }
    }

    public function update(Request $request, int $id)
    {
        if ($id) {
            try {
                $corrective = CorrectiveMonitoringRSST::findOrFail($id);
                if (auth()->check()) {
                    $rules = [
                        $this->report_id    => 'required|numeric',
                    ];
                    $validator = Validator::make($request->all(), $rules);
                    if ($validator->fails()) {
                        throw new ValidationException($validator->errors()->getMessages());
                    }

                    $corrective->work = $request->work ?? $corrective->work;
                    $corrective->corrective_action = $request->corrective_action ?? $corrective->corrective_action;
                    $corrective->date = $request->date ?? $corrective->date;
                    $corrective->executed = $request->executed ?? $corrective->executed;
                    $corrective->observations = $request->observations ?? $corrective->observations;
                    $corrective->approved = $request->approved ?? $corrective->approved;
                    $corrective->report_id = $request->report_id ?? $corrective->report_id;

                    $corrective->save();
                    return response()->json([
                        'data' => [
                            'corrective' => $corrective,
                        ],
                        'message' => 'Corrección actualizada con éxito!'
                    ], 201);
                }
            } catch (ModelNotFoundException $ex) {
                return response()->json(['message' => "Correción con id {$id} no existe!", 'error' => $ex->getMessage()], 404);
            } catch (\Exception $e) {
                return response()->json(['message' => 'Algo salio mal!', 'error' => $e], 403);
            }
        }
        return response()->json(['message' => "Corrección con id {$id} no existe!", 'error' => 'No se suministrado un id valido'], 404);
    }

    public function destroy(int $id)
    {
        if ($id) {
            try {
                $corrective = CorrectiveMonitoringRSST::findOrFail($id);

                $report = Report::findOrFail($corrective->report_id);
                $path = "storage/images/commerce/{$report->commerce_id}/report/{$report->id}/corrective/{$corrective->id}";


                // Eliminamos los archivos o el directorio del EMPLOYEE_REPORT            
                if (File::exists(public_path($path))) {
                    File::deleteDirectory(public_path($path));
                } else {
                    Log::notice('Borrar Carpeta/Directorio fallo: ' . public_path($path));
                }

                $corrective->delete();
                return response()->json([
                    'data' => [
                        'corrective' => $corrective,
                    ],
                    'message' => 'Corrección eliminada exitosamente!'
                ], 201);
            } catch (ModelNotFoundException $e) {
                return response()->json(['message' => "Corrección con id {$id} no existe!", 'error' => $e->getMessage()], 403);
            }
        }
        return response()->json(['message' => "Corrección con id {$id} no existe!", 'error' => 'No se suministrado un id valido'], 404);
    }

    public function showByReportId(Request $request, int $id)
    {
        if ($id) {
            try {

                return response()->json([
                    'data' => CorrectiveMonitoringRSST::query()->reportid($id)->get(),
                    'message' => 'Correcciones Consultadas correctamente'
                ], 200);
            } catch (ModelNotFoundException $e) {
                return response()->json(['message' => "Correcciones con id {$id} no existe!", 'error' => $e->getMessage()], 403);
            }
        }
        return response()->json(['message' => "Correcciones con id {$id} no existe!", 'error' => 'No se suministrado un id valido'], 404);
    }
}
