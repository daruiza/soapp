<?php

namespace App\Query\Request;

use Illuminate\Support\Facades\DB;
use App\Model\Core\Employee;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\Query\Abstraction\IEmployeeQuery;


class EmployeeQuery implements IEmployeeQuery
{
    private $identification = 'identification';
    private $name = 'name';
    private $lastname = 'lastname';
    private $email = 'email';
    private $phone = 'phone';

    public function index(Request $request)
    {

        $commerceid = $request->commerce_id ?? 1;
        $employee = Employee::query()
            ->select('employee_last_report.*', 'reports.date as reports_date', 'employee_report.employee_state')
            ->from(function ($query) use ($commerceid) {
                $query
                    ->select(
                        DB::raw('MAX(employee_report.report_id) as max_report_id'),
                        'employees.*'
                    )
                    ->from('employees')
                    ->leftJoin('employee_report', 'employees.id', '=', 'employee_report.employee_id')
                    ->where('employees.commerce_id', $commerceid)
                    ->groupBy('employees.id');
            }, 'employee_last_report')
            ->leftJoin('reports', 'employee_last_report.max_report_id', '=', 'reports.id')
            ->leftJoin('employee_report', 'employee_last_report.id', '=', 'employee_report.id')
            ->orderBy('employee_last_report.id', $request->sort ?? 'ASC')
            ->paginate($request->limit ?? 8, ['*'], '', $request->page ?? 1);

        return response()->json([
            'data' => [
                'employee' => $employee,
            ],
            'message' => 'Datos de colaboradores Consultados Correctamente!!'
        ], 200);
    }

    public function store(Request $request)
    {
        $rules = [
            $this->identification => 'required|string|max:128|unique:employees',
            $this->email          => 'required|string|max:128|email|unique:employees',
            $this->name           => 'required|string|min:1|max:128|',
            $this->lastname       => 'required|string|min:1|max:128|',
            $this->phone          => 'numeric|digits_between:7,10',
        ];
        try {
            // Ejecutamos el validador y en caso de que falle devolvemos la respuesta
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                throw (new ValidationException($validator->errors()->getMessages()));
            }
            // Creamos el nuevo colaborador
            $employee = new Employee();
            $request->request->add(['active' => 1]);
            $newEmployee = $employee->create($request->input());

            return response()->json([
                'data' => [
                    'employee' => $newEmployee,
                ],
                'message' => 'Colaborador creado correctamente!'
            ], 201);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Algo salio mal!', 'error' => $e], 403);
        }
    }

    public function update(Request $request, int $id)
    {
        if ($id) {
            try {
                $employee = Employee::findOrFail($id);
                $rules = [
                    $this->identification => 'required|string|max:128|', Rule::unique('employees')->ignore($employee->id),
                    $this->email          => 'required|string|max:128|email|', Rule::unique('employees')->ignore($employee->id),
                    $this->name           => 'required|string|min:1|max:128|',
                    $this->lastname       => 'required|string|min:1|max:128|',
                    $this->phone          => 'numeric|digits_between:7,10|',
                ];
                $validator = Validator::make($request->all(), $rules);
                if ($validator->fails()) {
                    throw (new ValidationException($validator->errors()->getMessages()));
                }
                $employee->identification = $request->identification ?? $employee->identification;
                $employee->name = $request->name ?? $employee->name;
                $employee->lastname = $request->lastname ?? $employee->lastname;
                $employee->identification_type = $request->identification_type ?? $employee->identification_type;
                $employee->email = $request->email ?? $employee->email;
                $employee->birth_date = $request->birth_date ?? $employee->birth_date;
                $employee->adress = $request->adress ?? $employee->adress;
                $employee->phone = $request->phone ?? $employee->phone;
                $employee->photo = $request->photo ?? $employee->photo;
                $employee->commerce_id = $request->commerce_id ?? $employee->commerce_id;
                $employee->is_employee = $request->is_employee ?? $employee->is_employee;
                $employee->save();

                return response()->json([
                    'data' => [
                        'employee' => $employee,
                    ],
                    'message' => 'Colaborador actualizado con éxito!'
                ], 201);
            } catch (ModelNotFoundException $ex) {
                return response()->json(['message' => "Colaborador con id {$id} no existe!", 'error' => $ex->getMessage()], 404);
            } catch (\Exception $e) {
                return response()->json(['message' => 'Algo salio mal!', 'error' => $e], 403);
            }
        }
    }

    public function destroy(Int $id)
    {
        if (auth()->check() && auth()->user()->rol_id == 1) {

            if ($id) {
                try {
                    $employee = Employee::findOrFail($id);
                    $employee->delete();

                    return response()->json([
                        'data' => [
                            'employee' => $employee,
                        ],
                        'message' => 'Colaborador eliminado con éxito!'
                    ], 201);
                } catch (ModelNotFoundException $e) {
                    return response()->json(['message' => "Colaborador con id {$id} no existe!", 'error' => $e->getMessage()], 403);
                }
            }
        } else {
            return response()->json(['message' => 'Necesita permisos de super-administrador!'], 403);
        }
    }
    public function showByEmployeeId(Request $request, int $id)
    {
        if ($id) {
            try {
                $employee = Employee::findOrFail($id);
                $employee->id;
                return response()->json([
                    'data' => [
                        'employee' => $employee,
                    ],
                    'message' => 'Datos de Colaborador Consultados Correctamente!'
                ], 201);
            } catch (ModelNotFoundException $e) {
                return response()->json(['message' => "Empledo con id {$id} no existe!", 'error' => $e->getMessage()], 403);
            }
        }
    }
}
