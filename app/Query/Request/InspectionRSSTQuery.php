<?php

namespace App\Query\Request;

use Illuminate\Http\Request;
use App\Query\Abstraction\IInspectionRSSTQuery;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\ModelNotFoundException;

use Illuminate\Validation\ValidationException;
use App\Model\Core\InspectionRSST;

use App\Model\Core\Report;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;

class InspectionRSSTQuery implements IInspectionRSSTQuery
{

    private $work = 'work';
    private $machines = 'machines';
    private $vehicles = 'vehicles';
    private $tools = 'tools';
    private $epp = 'epp';
    private $cleanliness = 'cleanliness';
    private $chemicals = 'chemicals';
    private $risk_work = 'risk_work';
    private $emergency_item = 'emergency_item';
    private $other = 'other';
    private $report_id = 'report_id';

    public function index(Request $request)
    {
        return response()->json([
            'data' => InspectionRSST::all(),
            'message' => 'Inspecciones Consultadas correctamente'
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

            $inspectionrsst = new InspectionRSST();
            $newInspectionSST = $inspectionrsst->create($request->input());

            return response()->json([
                'data' => [
                    'inspection' => $newInspectionSST,
                ],
                'message' => 'Inspección creadó correctamente!'
            ], 201);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Algo salio mal!', 'error' => $e], 403);
        }
    }

    public function update(Request $request, int $id)
    {
        if ($id) {
            try {
                $inspection = InspectionRSST::findOrFail($id);
                if (auth()->check()) {
                    $rules = [
                        $this->report_id    => 'required|numeric',
                    ];
                    $validator = Validator::make($request->all(), $rules);
                    if ($validator->fails()) {
                        throw new ValidationException($validator->errors()->getMessages());
                    }

                    $inspection->item = $request->item ?? $inspection->item;
                    $inspection->name = $request->name ?? $inspection->name;
                    $inspection->rule = $request->rule ?? $inspection->rule;
                    $inspection->detail = $request->detail ?? $inspection->detail;
                    $inspection->canon = $request->canon ?? $inspection->canon;
                    $inspection->approved = $request->approved ?? $inspection->approved;
                    $inspection->dateinit = $request->dateinit ?? $inspection->dateinit;
                    $inspection->dateclose = $request->dateclose ?? $inspection->dateclose;
                    $inspection->report_id = $request->report_id ?? $inspection->report_id;

                    $inspection->save();
                    return response()->json([
                        'data' => [
                            'inspection' => $inspection,
                        ],
                        'message' => 'Inspección actualizada con éxito!'
                    ], 201);
                }
            } catch (ModelNotFoundException $ex) {
                return response()->json(['message' => "Inspección con id {$id} no existe!", 'error' => $ex->getMessage()], 404);
            } catch (\Exception $e) {
                return response()->json(['message' => 'Algo salio mal!', 'error' => $e], 403);
            }
        }
        return response()->json(['message' => "Inspección con id {$id} no existe!", 'error' => 'No se suministrado un id valido'], 404);
    }

    public function destroy(int $id)
    {
        if ($id) {
            try {
                $inspection = InspectionRSST::findOrFail($id);

                $report = Report::findOrFail($inspection->report_id);
                $path = "storage/images/commerce/{$report->commerce_id}/report/{$report->id}/inspections/{$inspection->id}";


                // Eliminamos los archivos o el directorio del EMPLOYEE_REPORT            
                if (File::exists(public_path($path))) {
                    File::deleteDirectory(public_path($path));
                } else {
                    Log::notice('Borrar Carpeta/Directorio fallo: ' . public_path($path));
                }

                $inspection->delete();
                return response()->json([
                    'data' => [
                        'inspection' => $inspection,
                    ],
                    'message' => 'Inspección eliminada exitosamente!'
                ], 201);
            } catch (ModelNotFoundException $e) {
                return response()->json(['message' => "Inspección con id {$id} no existe!", 'error' => $e->getMessage()], 403);
            }
        }
        return response()->json(['message' => "Inspección con id {$id} no existe!", 'error' => 'No se suministrado un id valido'], 404);
    }

    public function showByReportId(Request $request, int $id)
    {
        if ($id) {
            try {

                return response()->json([
                    'data' => InspectionRSST::query()->reportid($id)->get(),
                    'message' => 'Inspecciones Consultadas correctamente'
                ], 200);
            } catch (ModelNotFoundException $e) {
                return response()->json(['message' => "Inspecciones con id {$id} no existe!", 'error' => $e->getMessage()], 403);
            }
        }
        return response()->json(['message' => "Inspecciones con id {$id} no existe!", 'error' => 'No se suministrado un id valido'], 404);
    }
}
