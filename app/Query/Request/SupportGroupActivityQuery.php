<?php

namespace App\Query\Request;

use Illuminate\Http\Request;
use App\Query\Abstraction\ISupportGroupActivityQuery;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\ModelNotFoundException;

use Illuminate\Validation\ValidationException;
use App\Model\Core\SupportGroupActivity;

use App\Model\Core\Report;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;

class SupportGroupActivityQuery implements ISupportGroupActivityQuery
{

    private  $support_group = 'support_group';
    private  $date_meet = 'date_meet';
    private  $responsible = 'responsible';
    private  $tasks_copasst = 'tasks_copasst';
    private  $approved = 'approved';
    private  $report_id = 'report_id';

    public function index(Request $request)
    {
        return response()->json([
            'data' => SupportGroupActivity::all(),
            'message' => 'Soportes consultados correctamente'
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

            $supportactivity = new SupportGroupActivity();
            $newSupportActivity = $supportactivity->create($request->input());

            return response()->json([
                'data' => [
                    'supportactivity' => $newSupportActivity,
                ],
                'message' => 'Corrección creadó correctamente!'
            ], 201);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Algo salio mal!', 'error' => $e], 403);
        }
    }

    public function update(Request $request, int $id)
    {
        if ($id) {
            try {
                $supportactivity = SupportGroupActivity::findOrFail($id);
                if (auth()->check()) {
                    $rules = [
                        $this->report_id    => 'required|numeric',
                    ];
                    $validator = Validator::make($request->all(), $rules);
                    if ($validator->fails()) {
                        throw new ValidationException($validator->errors()->getMessages());
                    }

                    $supportactivity->support_group = $request->support_group ?? $supportactivity->support_group;
                    $supportactivity->date_meet = $request->date_meet ?? $supportactivity->date_meet;
                    $supportactivity->responsible = $request->responsible ?? $supportactivity->responsible;
                    $supportactivity->tasks_copasst = $request->tasks_copasst ?? $supportactivity->tasks_copasst;
                    $supportactivity->approved = $request->approved ?? $supportactivity->approved;
                    $supportactivity->report_id = $request->report_id ?? $supportactivity->report_id;

                    $supportactivity->save();
                    return response()->json([
                        'data' => [
                            'supportactivity' => $supportactivity,
                        ],
                        'message' => 'Corrección actualizada con éxito!'
                    ], 201);
                }
            } catch (ModelNotFoundException $ex) {
                return response()->json(['message' => "Correción con id {$id} no existe!", 'error' => $ex->getMessage()], 404);
            } catch (\Exception $e) {
                return response()->json(['message' => 'Algo salio mal!', 'error' => $e], 403);
            }
        }
        return response()->json(['message' => "Corrección con id {$id} no existe!", 'error' => 'No se suministrado un id valido'], 404);
    }

    public function destroy(int $id)
    {
        if ($id) {
            try {
                $supportactivity = SupportGroupActivity::findOrFail($id);

                $report = Report::findOrFail($supportactivity->report_id);
                $path = "commerce/{$report->commerce_id}/report/{$report->id}/supportactivity/{$supportactivity->id}";

                // LLamado de delete de UploadQuery
                $request = new Request();
                $request->setMethod('DELETE');
                $request->request->add(['path' => $path]);
                UploadQuery::deleteFile($request);

                $supportactivity->delete();
                return response()->json([
                    'data' => [
                        'supportactivity' => $supportactivity,
                    ],
                    'message' => 'Corrección eliminada exitosamente!'
                ], 201);
            } catch (ModelNotFoundException $e) {
                return response()->json(['message' => "Corrección con id {$id} no existe!", 'error' => $e->getMessage()], 403);
            }
        }
        return response()->json(['message' => "Corrección con id {$id} no existe!", 'error' => 'No se suministrado un id valido'], 404);
    }

    public function showByReportId(Request $request, int $id)
    {
        if ($id) {
            try {

                return response()->json([
                    'data' => SupportGroupActivity::query()->reportid($id)->get(),
                    'message' => 'Soportes consultados correctamente'
                ], 200);
            } catch (ModelNotFoundException $e) {
                return response()->json(['message' => "Soportes con id {$id} no existe!", 'error' => $e->getMessage()], 403);
            }
        }
        return response()->json(['message' => "Soportes con id {$id} no existe!", 'error' => 'No se suministrado un id valido'], 404);
    }
}
