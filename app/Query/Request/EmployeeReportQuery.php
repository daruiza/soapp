<?php

namespace App\Query\Request;


use App\Model\Core\EmployeeReport;
use App\Model\Core\Report;

use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use Carbon\Carbon;

use App\Query\Abstraction\IEmployeeReportQuery;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;

class EmployeeReportQuery implements IEmployeeReportQuery
{
    
    public function index(Request $request)
    {
       
    }

    public function store(Request $request)
    {

        try{
            //Validamos que no exista el elemento a guardar
            $employee_report_find = EmployeeReport::query()
                ->where('id', 1)
                ->employee_state($request->employee_state)
                ->employee_id($request->employee_id)
                ->report_id($request->report_id)
                ->first();

            $message = 'El estado no fue asociado';
            $new_employee_report = null;
            
            if(is_null($employee_report_find)) {
                // Creamos el nuevo elemento
                $employee_report = new EmployeeReport();
                $new_employee_report = $employee_report->create($request->input());
                $message = 'Estado asociado Correctamente';    
            }

            return response()->json([
                'data' => [
                    'employee_report' => $new_employee_report,
                ],
                'message' => $message
            ], is_null($new_employee_report)?404:200);

        }catch (ModelNotFoundException $ex) {
            return response()->json(['error' => $ex->getMessage()], 404);
        } 
        catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], 402);
        }
        
        
       
    }

    public function update(Request $request, Int $id)
    {
        if ($id) {
            try {
                $employee_report = EmployeeReport::findOrFail($id);
                
                if (auth()->check()) {
                    $employee_report->attributes = $request->attributes ?? $employee_report->attributes;
                    
                    $employee_report->save();
                    return response()->json([
                        'data' => [
                            'employee_report' => $employee_report,                            
                        ],
                        'message' => 'Reporte Colaborador actualizado con éxito!'
                    ], 201);
                }
            } catch (ModelNotFoundException $ex) {
                return response()->json(['message' => "Colaborador con id {$id} no existe!", 'error' => $ex->getMessage()], 404);
            } catch (\Exception $e) {
                return response()->json(['message' => 'Algo salio mal!', 'error' => $e], 403);
            }
        } 
        return response()->json(['request' => $request], 200);
    }

    
    public function destroy(Int $id)
    {
        //Borramos las evidecnias
        //borramos al carpeta de imagenes de las evidencias
        try {
            $employee_report = EmployeeReport::findOrFail($id);
            $report = Report::findOrFail($employee_report->report_id);            
            $path = "storage/images/commerce/{$report->commerce_id}/report/{$report->id}/employee_report/{$employee_report->id}";
            

            // Eliminamos los archivos o el directorio del EMPLOYEE_REPORT            
            if(File::exists(public_path($path))){
                File::deleteDirectory(public_path($path));                                
            }else{
                Log::notice('Borrar Carpeta/Directorio fallo: '.public_path($path));
            }
            
            $employee_report->delete();
            return response()->json([
                'data' => [
                    'employee_report' => $employee_report,
                ],
                'message' => 'Evidencia eliminado exitosamente!'
            ], 201);

        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => "Datos EmployeeReport con id {$id} no existe!", 'error' => $e->getMessage()], 403);
        }
    }
}
