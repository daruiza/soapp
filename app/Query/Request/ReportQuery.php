<?php

namespace App\Query\Request;

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
    private $name = 'name';
    private $project = 'project';
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
                    'id', 'name', 'project', 'responsible', 'email_responsible', 'phone_responsible', 'date',
                    'commerce_id',
                ])
                ->with(['commerce:id,name,nit,city,description'])
                ->name($request->name)
                ->orderBy('id', $request->sort ?? 'ASC')
                ->paginate($request->limit ?? 10, ['*'], '', $request->page ?? 1);

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
            $this->name                 => 'required|string|min:1|max:128|unique:reports|',
            $this->responsible          => 'required|string|min:1|max:128|',
            $this->email_responsible    => 'required|string|max:128|email|unique:reports',
            $this->phone_responsible    => 'numeric|digits_between:7,10|'
        ];
        try {
            // Ejecutamos el validador y en caso de que falle devolvemos la respuesta
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                throw (new ValidationException($validator->errors()->getMessages()));
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
                    $this->name                 => 'required|string|min:1|max:128|', Rule::unique('reports')->ignore($report->id),
                    $this->responsible          => 'required|string|min:1|max:128|',
                    $this->email_responsible    => 'required|string|max:128|email|', Rule::unique('reports')->ignore($report->id),
                    $this->phone_responsible    => 'numeric|digits_between:7,10|'
                ];
                $validator = Validator::make($request->all(), $rules);
                if ($validator->fails()) {
                    throw (new ValidationException($validator->errors()->getMessages()));
                }
                $report->name = $request->name ?? $report->name;
                $report->project = $request->project ?? $report->project;
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
