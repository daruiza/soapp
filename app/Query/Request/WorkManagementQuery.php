<?php

namespace App\Query\Request;

use Illuminate\Http\Request;
use App\Query\Abstraction\IWorkManagementQuery;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\ModelNotFoundException;

use Illuminate\Validation\ValidationException;
use App\Model\Core\WorkManagement;

use App\Model\Core\Report;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;

class WorkManagementQuery implements IWorkManagementQuery
{

    private  $activity = 'activity';
    private  $work_type = 'work_type';
    private  $workers_activity = 'workers_activity';
    private  $workers_trained = 'workers_trained';
    private  $permissions = 'permissions';
    private  $observations = 'observations';
    private  $approved = 'approved';
    private  $report_id = 'report_id';

    public function index(Request $request)
    {
        return response()->json([
            'data' => WorkManagement::all(),
            'message' => 'Trabajos consultados correctamente'
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

            $workmanagement = new WorkManagement();
            $newworkmanagement = $workmanagement->create($request->input());

            return response()->json([
                'data' => [
                    'workmanagement' => $newworkmanagement,
                ],
                'message' => 'Gestión de Trabajo creadó correctamente!'
            ], 201);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Algo salio mal!', 'error' => $e], 403);
        }
    }

    public function update(Request $request, int $id)
    {
        if ($id) {
            try {
                $workmanagement = WorkManagement::findOrFail($id);
                if (auth()->check()) {
                    $rules = [
                        $this->report_id    => 'required|numeric',
                    ];
                    $validator = Validator::make($request->all(), $rules);
                    if ($validator->fails()) {
                        throw new ValidationException($validator->errors()->getMessages());
                    }

                    $workmanagement->activity = $request->activity ?? $workmanagement->activity;
                    $workmanagement->work_type = $request->work_type ?? $workmanagement->work_type;
                    $workmanagement->workers_activity = $request->workers_activity ?? $workmanagement->workers_activity;
                    $workmanagement->workers_trained = $request->workers_trained ?? $workmanagement->workers_trained;
                    $workmanagement->permissions = $request->permissions ?? $workmanagement->permissions;
                    $workmanagement->observations = $request->observations ?? $workmanagement->observations;                    
                    $workmanagement->approved = $request->approved ?? $workmanagement->approved;
                    $workmanagement->report_id = $request->report_id ?? $workmanagement->report_id;

                    $workmanagement->save();
                    return response()->json([
                        'data' => [
                            'workmanagement' => $workmanagement,
                        ],
                        'message' => 'Gestión de Trabajo  actualizada con éxito!'
                    ], 201);
                }
            } catch (ModelNotFoundException $ex) {
                return response()->json(['message' => "Gestión de Trabajo con id {$id} no existe!", 'error' => $ex->getMessage()], 404);
            } catch (\Exception $e) {
                return response()->json(['message' => 'Algo salio mal!', 'error' => $e], 403);
            }
        }
        return response()->json(['message' => "Gestión de Trabajo  con id {$id} no existe!", 'error' => 'No se suministrado un id valido'], 404);
    }

    public function destroy(int $id)
    {
        if ($id) {
            try {
                $workmanagement = WorkManagement::findOrFail($id);

                $report = Report::findOrFail($workmanagement->report_id);
                $path = "commerce/{$report->commerce_id}/report/{$report->id}/workmanagement/{$workmanagement->id}";

                // LLamado de delete de UploadQuery
                $request = new Request();
                $request->setMethod('DELETE');
                $request->request->add(['path' => $path]);
                UploadQuery::deleteFile($request);

                $workmanagement->delete();
                return response()->json([
                    'data' => [
                        'workmanagement' => $workmanagement,
                    ],
                    'message' => 'Gestión de Trabajo  eliminada exitosamente!'
                ], 201);
            } catch (ModelNotFoundException $e) {
                return response()->json(['message' => "Gestión de Trabajo  con id {$id} no existe!", 'error' => $e->getMessage()], 403);
            }
        }
        return response()->json(['message' => "Gestión de Trabajo con id {$id} no existe!", 'error' => 'No se suministrado un id valido'], 404);
    }

    public function showByReportId(Request $request, int $id)
    {
        if ($id) {
            try {

                return response()->json([
                    'data' => WorkManagement::query()->reportid($id)->get(),
                    'message' => 'Gestión de Trabajo consultados correctamente'
                ], 200);
            } catch (ModelNotFoundException $e) {
                return response()->json(['message' => "Gestión de Trabajo con id {$id} no existe!", 'error' => $e->getMessage()], 403);
            }
        }
        return response()->json(['message' => "Gestión de Trabajo con id {$id} no existe!", 'error' => 'No se suministrado un id valido'], 404);
    }
}
