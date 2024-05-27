<?php

namespace App\Query\Request;

use Illuminate\Http\Request;
use App\Query\Abstraction\IActivityQuery;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\ModelNotFoundException;

use Illuminate\Validation\ValidationException;
use App\Model\Core\Activity;
use App\Model\Core\Report;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;

class ActivityQuery implements IActivityQuery
{

private $activity = 'activity';
private $date = 'date';
private $report_id = 'report_id';
private $approved = 'approved';

    public function index(Request $request)
    {
        return response()->json([
            'data' => Activity::all(),
            'message' => 'Actividades Consultadas correctamente'
        ], 200);
    }

    public function store(Request $request)
    {
        $rules = [
            $this->activity        => 'required|string',
            $this->date         => 'required|string',
            $this->report_id    => 'required|numeric',            
        ];

        try {
            // Ejecutamos el validador y en caso de que falle devolvemos la respuesta
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                throw (new ValidationException($validator->errors()->getMessages()));
            }

            $Activity = new Activity();
            $newActivity = $Activity->create($request->input());
            
            return response()->json([
                'data' => [
                    'activity' => $newActivity,
                ],
                'message' => 'Actividad creadá correctamente!'
            ], 201);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Algo salio mal!', 'error' => $e], 403);
        }        
    }

    public function update(Request $request, int $id)
    {
        if ($id) {
            try {
                $Activity = Activity::findOrFail($id);
                if (auth()->check()) {
                    $rules = [                        
                        $this->activity        => 'required|string',
                        $this->date         => 'required|string',
                        $this->report_id    => 'required|numeric',                        
                    ];
                    $validator = Validator::make($request->all(), $rules);
                    if ($validator->fails()) {
                        throw (new ValidationException($validator->errors()->getMessages()));
                    }

                    $Activity->activity = $request->activity ?? $Activity->activity;
                    $Activity->date = $request->date ?? $Activity->date;
                    $Activity->report_id = $request->report_id ?? $Activity->report_id;
                    $Activity->approved = $request->approved ?? $Activity->approved;

                    $Activity->save();
                    return response()->json([
                        'data' => [
                            'activity' => $Activity,                            
                        ],
                        'message' => 'Actividad actualizada con éxito!'
                    ], 201);
                }   
                
            } catch (ModelNotFoundException $ex) {
                return response()->json(['message' => "Actividad con id {$id} no existe!", 'error' => $ex->getMessage()], 404);
            } catch (\Exception $e) {
                return response()->json(['message' => 'Algo salio mal!', 'error' => $e], 403);
            }
        }
        return response()->json(['message' => "Actividad con id {$id} no existe!", 'error' => 'No se suministrado un id valido'], 404);        
    }

    public function destroy(int $id)
    {
        if ($id) {
            try {
                $activity = Activity::findOrFail($id);  
                
                $report = Report::findOrFail($activity->report_id);            
                $path = "commerce/{$report->commerce_id}/report/{$report->id}/activities/{$activity->id}";
                
                // LLamado de delete de UploadQuery
                $request = new Request();
                $request->setMethod('DELETE');
                $request->request->add(['path' => $path]);
                UploadQuery::deleteFile($request);

                $activity->delete();
                return response()->json([
                    'data' => [
                        'activity' => $activity,
                    ],
                    'message' => 'Actividad eliminada exitosamente!'
                ], 201);
    
            } catch (ModelNotFoundException $e) {
                return response()->json(['message' => "Actividad con id {$id} no existe!", 'error' => $e->getMessage()], 403);
            }
        }
        return response()->json(['message' => "Actividad con id {$id} no existe!", 'error' => 'No se suministrado un id valido'], 404);    
    }
    
    public function showByReportId(Request $request, int $id){
        if ($id) {
            try {

                return response()->json([
                    //'data' => Activity::where('report_id',$id)->get(),
                    'data' => Activity::query()->reportid($id)->get(),
                    'message' => 'Capacitaciónes Consultadas correctamente'
                ], 200);
                
            } catch (ModelNotFoundException $e) {
                return response()->json(['message' => "Actividad con id {$id} no existe!", 'error' => $e->getMessage()], 403);
            }
        }
        return response()->json(['message' => "Actividad con id {$id} no existe!", 'error' => 'No se suministrado un id valido'], 404);        
    }

}
