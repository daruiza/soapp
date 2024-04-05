<?php

namespace App\Query\Request;

use Illuminate\Support\Facades\DB;

use App\User;
use Carbon\Carbon;
use App\Model\Core\Report;
use App\Model\Core\Employee;
use App\Model\Core\Commerce;

use App\Enums\RolEnum;

use Illuminate\Validation\ValidationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\Query\Abstraction\IReportQuery;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;

class ReportQuery implements IReportQuery
{
    private $project = 'project';
    private $progress = 'progress';
    private $description = 'description';
    private $focus = 'focus';
    private $active = 'active';
    private $responsible = 'responsible';
    private $email_responsible = 'email_responsible';
    private $phone_responsible = 'phone_responsible';
    private $elaborated = 'elaborated';
    private $email_elaborated = 'email_elaborated';
    private $phone_elaborated = 'phone_elaborated';
    private $passed = 'passed';
    private $email_passed = 'email_passed';
    private $phone_passed = 'phone_passed';

    private $date = 'date';
    private $commerce_id = 'commerce_id';

    public function index(Request $request)
    {
        try {
            $report = Report::query()
                ->select([
                    'id',
                    'project',
                    'progress',
                    'description',
                    'focus',
                    'active',
                    'responsible',
                    'email_responsible',
                    'phone_responsible',
                    'elaborated',
                    'email_elaborated',
                    'phone_elaborated',
                    'passed',
                    'email_passed',
                    'phone_passed',
                    'date',
                    'commerce_id',
                ])
                ->with(['commerce:id,name,nit,city,description'])
                // ->with(['employee:id,name,lastname,identification,identification_type,email,birth_date,phone,photo,adress,is_employee,active'])
                ->commerceid($request->commerce_id)
                ->project($request->project)
                ->responsible($request->responsible)
                ->date($request->year, $request->month)
                ->orderBy('date', $request->sort ?? 'ASC')
                ->paginate($request->limit ?? 12, ['*'], '', $request->page ?? 1);
            // ->toSql();

            return response()->json([
                'data' => [
                    'report' => $report,
                ],
                'message' => 'Datos de Reportes Consultados Correctamente!'
            ], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], 402);
        }
    }

    public function store(Request $request)
    {
        // Creamos las reglas de validación
        $rules = [
            $this->project              => 'required|string',
            $this->date                 => 'required|date',
            $this->responsible          => 'required|string|min:1|max:128|',
            $this->email_responsible    => 'required|string|max:128|email',
            $this->phone_responsible    => 'numeric|digits_between:7,10|',
            $this->commerce_id          => 'required'
        ];
        try {
            // Ejecutamos el validador y en caso de que falle devolvemos la respuesta
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                throw (new ValidationException($validator->errors()->getMessages()));
            }

            // Validar que no exista la fecha para el año por ingresar
            $date = Carbon::create($request->date);
            $endday = Carbon::create($date->year, $date->month)->endOfMonth()->day;
            $datefrom = Carbon::create($date->year, $date->month, 1, 0, 0, 0);
            $dateto = Carbon::create($date->year, $date->month, $endday, 23, 59, 59);

            $reportfind = Report::query()
                ->where('commerce_id', $request->commerce_id)
                ->whereBetween('date', [
                    $datefrom->toDateTimeString(),
                    $dateto->toDateTimeString()
                ])->get();
            if (isset($reportfind) && count($reportfind)) {
                throw (new ValidationException(['date' => 'La fecha del reporte ya existe']));
            }

            // Conltamos el último reporte
            $lastreport = Report::query()
                ->where('commerce_id', $request->input('commerce_id'))
                ->with(['employee'])
                ->latest('id', 'desc')->first();

            // Creamos el nuevo reporte
            $report = new Report();
            $newReport = $report->create($request->input());

            // llena el nuevo reporte con los colaboradores del último reporte en estado Pendiente
            if ($lastreport) {
                if (count($lastreport->employee)) {
                    foreach ($lastreport->employee as $employee) {
                        DB::table('employee_report')->insert([
                            'report_id' => $newReport->id,
                            'employee_id' => $employee->id,
                            'employee_state' => 'Pendiente',
                        ]);
                    }
                }
            }

            return response()->json([
                'data' => [
                    'report' => $newReport,
                ],
                'message' => 'Reporte creado correctamente!'
            ], 201);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Algo salio mal!', 'error' => $e->getMessage()], 403);
        }
    }

    public function update(Request $request, Int $id)
    {
        if ($id) {
            try {
                $report = Report::findOrFail($id);
                $rules = [
                    $this->responsible          => 'required|string|min:1|max:128|',
                    $this->email_responsible    => 'required|string|max:128|email|', Rule::unique('reports')->ignore($report->id),
                    $this->phone_responsible    => 'numeric|digits_between:7,10|'
                ];
                $validator = Validator::make($request->all(), $rules);
                if ($validator->fails()) {
                    throw (new ValidationException($validator->errors()->getMessages()));
                }
                // $report->name = $request->name ?? $report->name;
                $report->project = $request->project ?? $report->project;
                $report->description = $request->description ?? $report->description;
                $report->focus = $request->focus === 0 || $request->focus === 1 ? $request->focus : $report->focus;
                $report->active = $request->active === 0 || $request->active === 1 ? $request->active : $report->active;
                $report->responsible = $request->responsible ?? $report->responsible;
                $report->email_responsible = $request->email_responsible ?? $report->email_responsible;
                $report->phone_responsible = $request->phone_responsible ?? $report->phone_responsible;
                $report->elaborated = $request->elaborated ?? $report->elaborated;
                $report->email_elaborated = $request->email_elaborated ?? $report->email_elaborated;
                $report->phone_elaborated = $request->phone_elaborated ?? $report->phone_elaborated;
                $report->passed = $request->passed ?? $report->passed;
                $report->email_passed = $request->email_passed ?? $report->email_passed;
                $report->phone_passed = $request->phone_passed ?? $report->phone_passed;
                $report->date = $request->date ?? $report->date;
                $report->commerce_id = $request->commerce_id ?? $report->commerce_id;
                $report->save();

                return response()->json([
                    'data' => [
                        'report' => $report,
                    ],
                    'message' => 'Reporte actualizado con éxito!'
                ], 201);
            } catch (ModelNotFoundException $ex) {
                return response()->json(['message' => "Reporte con id {$id} no existe!", 'error' => $ex->getMessage()], 404);
            } catch (\Exception $e) {
                return response()->json(['message' => 'Algo salio mal!', 'error' => $e], 403);
            }
        }
    }

    public function showByReportId(Request $request, $id)
    {
        if ($id) {
            try {
                // verificamos que el reporte le pertenezca al usuario
                // en caso de que el usuario sea un cliente,
                // los agentes tienen acceso a todos los reportes

                $user = User::query()
                    ->where('users.id', $request->user()->id)
                    ->with(['commerce'])
                    ->first();                

                $report = Report::query()
                    ->where('reports.id', $id)
                    ->with(['commerce'])
                    ->with(['employee'])
                    ->with(['trainingsst'])
                    ->with(['activities'])
                    ->with(['evidences'])
                    ->first();
                // ->toSql();

                // El usuario es Cliente,    
                if($user->rol_id === RolEnum::rol('CLIENTE')){
                    //debe ser dueño del reporte
                    if($user->commerce->id !== $report->commerce->id){
                        return response()->json([
                            'message' => 'El usuario no tiene permisos sobre el reporte solicitado',                                                    
                        ], 401);
                    }
                }

                // Se agrega el estado
                foreach ($report->employee as $employee) {
                    $emp = Employee::query($employee->id);
                    $employee->state = $emp->state($employee->pivot->employee_id, $employee->pivot->report_id);
                }

                return response()->json([
                    'data' => [
                        'report' => $report,
                    ],
                    'message' => 'Datos de Reporte Consultados Correctamente!'
                ], 201);
            } catch (ModelNotFoundException $e) {
                return response()->json(['message' => "Reporte con id {$id} no existe!", 'error' => $e->getMessage()], 403);
            }
        }
    }

    public function destroy(Int $id)
    {
        if ($id) {
            try {
                $report = Report::findOrFail($id);
            
                //Borramos el directorio
                $path = "storage/images/commerce/{$report->commerce_id}/report/{$report->id}";
                // Eliminamos los archivos o el directorio Report            
                if(File::exists(public_path($path))){
                    File::deleteDirectory(public_path($path));                                
                }else{
                    Log::notice('Borrar Carpeta/Directorio fallo: '.public_path($path));
                }

                $report->delete();
                return response()->json([
                    'data' => [
                        'report' => $report,
                    ],
                    'message' => 'Reporte eliminado con éxito!'
                ], 201);
            } catch (ModelNotFoundException $e) {
                return response()->json(['message' => "Reporte con id {$id} no existe!", 'error' => $e->getMessage()], 403);
            }
        }
    }
}
