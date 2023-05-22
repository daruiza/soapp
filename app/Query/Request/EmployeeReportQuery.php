<?php

namespace App\Query\Request;


use App\Model\Core\EmployeeReport;

use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use Carbon\Carbon;

use App\Query\Abstraction\IEmployeeReportQuery;
use Illuminate\Database\Eloquent\ModelNotFoundException;

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
      
    }

    
    public function destroy(Int $id)
    {
       
    }
}
