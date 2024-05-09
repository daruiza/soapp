<?php

namespace App\Query\Request;

use Illuminate\Http\Request;
use App\Query\Abstraction\IComplianceScheduleQuery;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\ModelNotFoundException;

use Illuminate\Validation\ValidationException;
use App\Model\Core\ComplianceSchedule;

use App\Model\Core\Report;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;

class ComplianceScheduleQuery implements IComplianceScheduleQuery
{
    private $company = 'company';
    private $planned_activities = 'planned_activities';
    private $executed_activities = 'executed_activities';
    private $compliance = 'compliance';
    private $approved = 'approved';
    private $report_id = 'report_id';

    public function index(Request $request)
    {
        return response()->json([
            'data' => ComplianceSchedule::all(),
            'message' => 'Compromisos Consultadas correctamente'
        ], 200);
    }

    public function store(Request $request)
    {
        $rules = [
            $this->company              => 'required|string',
            $this->planned_activities   => 'required|numeric',
            $this->executed_activities  => 'required|numeric',
            $this->report_id            => 'required|numeric',
        ];

        try {
            // Ejecutamos el validador y en caso de que falle devolvemos la respuesta
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                throw (new ValidationException($validator->errors()->getMessages()));
            }

            $ComplianceSchedule = new ComplianceSchedule();
            $newComplianceSchedule = $ComplianceSchedule->create($request->input());

            return response()->json([
                'data' => [
                    'complianceschedule' => $newComplianceSchedule,
                ],
                'message' => 'Cumplimiento de Calendario creadó correctamente!'
            ], 201);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Algo salio mal!', 'error' => $e], 403);
        }
    }

    public function update(Request $request, int $id)
    {
        if ($id) {
            try {
                $ComplianceSchedule = ComplianceSchedule::findOrFail($id);
                if (auth()->check()) {
                    $rules = [
                        $this->company              => 'required|string',
                        $this->planned_activities   => 'required|numeric',
                        $this->executed_activities  => 'required|numeric',
                        $this->report_id            => 'required|numeric',
                    ];
                    $validator = Validator::make($request->all(), $rules);
                    if ($validator->fails()) {
                        throw (new ValidationException($validator->errors()->getMessages()));
                    }

                    $ComplianceSchedule->company = $request->company ?? $ComplianceSchedule->company;
                    $ComplianceSchedule->planned_activities = $request->planned_activities ?? $ComplianceSchedule->planned_activities;
                    $ComplianceSchedule->executed_activities = $request->executed_activities ?? $ComplianceSchedule->executed_activities;
                    $ComplianceSchedule->compliance = $request->compliance ?? $ComplianceSchedule->compliance;
                    $ComplianceSchedule->approved = $request->approved ?? $ComplianceSchedule->approved;
                    $ComplianceSchedule->report_id = $request->report_id ?? $ComplianceSchedule->report_id;

                    $ComplianceSchedule->save();
                    return response()->json([
                        'data' => [
                            'complianceschedule' => $ComplianceSchedule,
                        ],
                        'message' => 'Cumplimiento de Calendario actualizada con éxito!'
                    ], 201);
                }
            } catch (ModelNotFoundException $ex) {
                return response()->json(['message' => "Cumplimiento de Calendario con id {$id} no existe!", 'error' => $ex->getMessage()], 404);
            } catch (\Exception $e) {
                return response()->json(['message' => 'Algo salio mal!', 'error' => $e], 403);
            }
        }
        return response()->json(['message' => "Cumplimiento de Calendario con id {$id} no existe!", 'error' => 'No se suministrado un id valido'], 404);
    }

    public function destroy(int $id)
    {
        if ($id) {
            try {
                $ComplianceSchedule = ComplianceSchedule::findOrFail($id);

                $report = Report::findOrFail($ComplianceSchedule->report_id);
                $path = "storage/images/commerce/{$report->commerce_id}/report/{$report->id}/complianceschedule/{$ComplianceSchedule->id}";


                // Eliminamos los archivos o el directorio del EMPLOYEE_REPORT            
                if (File::exists(public_path($path))) {
                    File::deleteDirectory(public_path($path));
                } else {
                    Log::notice('Borrar Carpeta/Directorio fallo: ' . public_path($path));
                }

                $ComplianceSchedule->delete();
                return response()->json([
                    'data' => [
                        'complianceschedule' => $ComplianceSchedule,
                    ],
                    'message' => 'Cumplimiento de Calendario eliminada exitosamente!'
                ], 201);
            } catch (ModelNotFoundException $e) {
                return response()->json(['message' => "Cumplimiento de Calendario con id {$id} no existe!", 'error' => $e->getMessage()], 403);
            }
        }
        return response()->json(['message' => "Cumplimiento de Calendario con id {$id} no existe!", 'error' => 'No se suministrado un id valido'], 404);
    }

    public function showByReportId(Request $request, int $id)
    {
        if ($id) {
            try {

                return response()->json([
                    //'data' => Activity::where('report_id',$id)->get(),
                    'data' => ComplianceSchedule::query()->reportid($id)->get(),
                    'message' => 'Capacitaciónes Consultadas correctamente'
                ], 200);
            } catch (ModelNotFoundException $e) {
                return response()->json(['message' => "Cumplimiento de Calendario con id {$id} no existe!", 'error' => $e->getMessage()], 403);
            }
        }
        return response()->json(['message' => "Cumplimiento de Calendario con id {$id} no existe!", 'error' => 'No se suministrado un id valido'], 404);
    }
}
