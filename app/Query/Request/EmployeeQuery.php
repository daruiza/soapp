<?php

namespace App\Query\Request;

use Illuminate\Support\Facades\DB;
use App\Model\Core\Employee;
use App\Model\Core\Commerce;
use App\Model\Core\User;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\Query\Abstraction\IEmployeeQuery;
use Carbon\Carbon;

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
            ->where(function ($orquery) use ($request) {
                $this->setAtributeIndexQuery(
                    $request->identification_type,
                    $orquery,
                    'employee_last_report',
                    'identification_type'
                );
                $this->setAtributeIndexQuery($request->name, $orquery, 'employee_last_report', 'name');
                $this->setAtributeIndexQuery($request->lastname, $orquery, 'employee_last_report', 'lastname');
                $this->setAtributeIndexQuery($request->email, $orquery, 'employee_last_report', 'email');
                $this->setAtributeIndexQuery($request->phone, $orquery, 'employee_last_report', 'phone');
                $this->setAtributeIndexQuery($request->adress, $orquery, 'employee_last_report', 'adress');
                if (isset($request->active)) {
                    $orquery->where('employee_last_report.active', $request->active ?? 1);
                }
                if (isset($request->is_employee)) {
                    $orquery->where('employee_last_report.is_employee', $request->is_employee ?? 1);
                }
                if (isset($request->birth_date)) {
                    $orquery->whereBetween(
                        'employee_last_report.birth_date',
                        [$request->birth_date, Carbon::now()->format('Y-m-d')]
                    );
                }
                $orquery;
            })
            ->orderBy('employee_last_report.id', $request->sort ?? 'DESC')
            ->paginate($request->limit ?? 7, ['*'], '', $request->page ?? 1);
        // ->toSql();

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

    public function destroy(int $id)
    {
        try {
            $employee = Employee::findOrFail($id);
            if (auth()->check() && auth()->user()->rol_id == 1) {
                $employee->delete();
                return response()->json([
                    'data' => [
                        'employee' => $employee,
                    ],
                    'message' => 'Empleado eliminado exitosamente!'
                ], 201);
            } elseif ($employee) {
                $eliminado = DB::table('employees as E')
                    ->join('commerces as C', 'E.commerce_id', '=', 'C.id')
                    ->select('E.*')
                    ->where('E.commerce_id', '=', auth()->user()->id)
                    ->where('E.id', '=', $id)
                    ->delete();
                if ($eliminado > 0) {
                    return response()->json([
                        'data' => [
                            'employee' => $employee,
                        ],
                        'message' => 'Empleado eliminado exitosamente!'
                    ]);
                } else {
                    return response()->json(['message' => 'No tienes permiso para eliminar el empleado!'], 403);
                }
            } else {
                return response()->json(['message' => 'Necesita permisos de super-administrador!'], 403);
            }
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => "Empleado con id {$id} no existe!", 'error' => $e->getMessage()], 403);
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

    public function setAtributeIndexQuery($value, $query, $table, $attribute)
    {
        if (isset($value)) {
            $query->where($table . '.' . $attribute, 'LIKE',  '%' . $value . '%');
        }
    }
}
