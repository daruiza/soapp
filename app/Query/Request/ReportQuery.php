<?php

namespace App\Query\Request;

use Carbon\Carbon;
use App\Model\Core\Report;
use App\Model\Admin\Commerce;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\Query\Abstraction\IReportQuery;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ReportQuery implements IReportQuery
{
    private $project = 'project';
    private $progress = 'progress';
    private $description = 'description';
    private $focus = 'focus';
    private $responsible = 'responsible';
    private $email_responsible = 'email_responsible';
    private $phone_responsible = 'phone_responsible';
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
                    'responsible',
                    'email_responsible',
                    'phone_responsible',
                    'date',
                    'commerce_id',
                ])
                ->with(['commerce:id,name,nit,city,description'])
                // ->with(['employee:id,name,lastname,identification,identification_type,email,birth_date,phone,photo,adress,is_employee,active'])
                ->commerceid($request->commerce_id)
                ->project($request->project)
                ->date($request->year, $request->month)
                ->orderBy('id', $request->sort ?? 'ASC')
                ->paginate($request->limit ?? 12, ['*'], '', $request->page ?? 1);
            // ->toSql();

            return response()->json([
                'data' => [
                    'report' => $report,
                ],
                'message' => 'Datos de Reportes Consultados Correctamente!'
            ], 201);
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
            $this->email_responsible    => 'required|string|max:128|email|unique:reports',
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
                ->whereBetween('date',  [
                    $datefrom->toDateTimeString(),
                    $dateto->toDateTimeString()
                ])->get();
            if (isset($reportfind) && count($reportfind)) {
                throw (new ValidationException(['date' => 'La fecha del reporte ya existe']));
            }

            // Creamos el nuevo reporte
            $report = new Report();
            $newReport = $report->create($request->input());

            return response()->json([
                'data' => [
                    'report' => $newReport,
                ],
                'message' => 'Reporte creado correctamente!'
            ], 201);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Algo salio mal!', 'error' => $e], 403);
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
                $report->focus = isset($request->focus) ?? $report->focus;
                $report->responsible = $request->responsible ?? $report->responsible;
                $report->email_responsible = $request->email_responsible ?? $report->email_responsible;
                $report->phone_responsible = $request->phone_responsible ?? $report->phone_responsible;
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
                $report = Report::findOrFail($id);

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
