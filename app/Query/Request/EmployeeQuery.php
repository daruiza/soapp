<?php

namespace App\Query\Request;

use App\Model\Admin\Employee;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\Query\Abstraction\IEmployeeQuery;


class EmployeeQuery implements IEmployeeQuery
{
    private $id = 'id';
    private $name = 'name';
    private $lastname = 'lastname';
    private $email = 'email';
    private $phone = 'phone';

    public function index(Request $request)
    {
        $employee = Employee::query()
            ->select(['id', 'name', 'lastname', 'phone', 'email', 'photo', 'adress', 'birth_date'])
            ->id($request->id)
            ->name($request->name)
            ->orderBy('id',  $request->sort ?? 'ASC')
            ->paginate($request->limit ?? 8, ['*'], '', $request->page ?? 1);

        return response()->json([
            'data' => [
                'employee' => $employee,
            ],
            'message' => 'Datos de empleados Consultados Correctamente!!'
        ], 200);
    }

    public function store(Request $request)
    {
        $rules = [
            $this->id            => 'required|numeric|unique:employees|',
            $this->name          => 'required|string|min:1|max:128|',
            $this->lastname      => 'required|string|min:1|max:128|',
            $this->email         => 'required|string|max:128|email|unique:employees',
            $this->phone         => 'numeric|digits_between:7,10',
        ];
        try {
            // Ejecutamos el validador y en caso de que falle devolvemos la respuesta
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                throw (new ValidationException($validator->errors()->getMessages()));
            }
            // Creamos el nuevo empleado
            $employee = new Employee();
            $request->request->add(['active' => 1]);
            $newEmployee = $employee->create($request->input());

            return response()->json([
                'data' => [
                    'employee' => $newEmployee,
                ],
                'message' => 'Empleado creado correctamente!'
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
                    $this->name          => 'required|string|min:1|max:128|',
                    $this->lastname      => 'required|string|min:1|max:128|',
                    $this->email         => 'required|string|max:128|email|', Rule::unique('employees')->ignore($employee->id),
                    $this->phone         => 'numeric|digits_between:7,10',
                ];
                $validator = Validator::make($request->all(), $rules);
                if ($validator->fails()) {
                    throw (new ValidationException($validator->errors()->getMessages()));
                }
                $employee->name = $request->name;
                $employee->lastname = $request->lastname ?? $employee->lastname;
                $employee->email = $request->email ?? $employee->email;
                $employee->birth_date = $request->birth_date ?? $employee->birth_date;
                $employee->adress = $request->adress ?? $employee->adress;
                $employee->phone = $request->phone ?? $employee->phone;
                $employee->photo = $request->photo ?? $employee->photos;
                $employee->save();

                return response()->json([
                    'data' => [
                        'employee' => $employee,
                    ],
                    'message' => 'Empleado actualizado con éxito!'
                ], 201);
            } catch (ModelNotFoundException $ex) {
                return response()->json(['message' => "Empleado con id {$id} no existe!", 'error' => $ex->getMessage()], 404);
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
                        'message' => 'Empleado eliminado con éxito!'
                    ], 201);
                } catch (ModelNotFoundException $e) {
                    return response()->json(['message' => "Empleado con id {$id} no existe!", 'error' => $e->getMessage()], 403);
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
                        'empleado' => $employee,
                    ],
                    'message' => 'Datos de Empleado Consultados Correctamente!'
                ], 201);
            } catch (ModelNotFoundException $e) {
                return response()->json(['message' => "Empledo con id {$id} no existe!", 'error' => $e->getMessage()], 403);
            }
        }
    }
}
