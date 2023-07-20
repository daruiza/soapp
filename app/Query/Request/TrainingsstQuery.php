<?php

namespace App\Query\Request;

use Illuminate\Http\Request;
use App\Query\Abstraction\ITrainingsstQuery;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\ModelNotFoundException;

use Illuminate\Validation\ValidationException;
use App\Model\Core\Trainingsst;

class TrainingsstQuery implements ITrainingsstQuery
{

private $topic = 'topic';
private $date = 'date';
private $hours = 'hours';
private $assistants = 'assistants';
private $report_id = 'report_id';
private $approved = 'approved';

    public function index(Request $request)
    {
        return response()->json([
            'data' => Trainingsst::all(),
            'message' => 'Capacitaciónes Consultadas correctamente'
        ], 200);
    }

    public function store(Request $request)
    {
        $rules = [
            $this->topic        => 'required|string',
            $this->date         => 'required|string',
            $this->hours        => 'required|numeric',
            $this->assistants   => 'required|numeric',
            $this->report_id    => 'required|numeric',            
        ];

        try {
            // Ejecutamos el validador y en caso de que falle devolvemos la respuesta
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                throw (new ValidationException($validator->errors()->getMessages()));
            }

            $Trainingsst = new Trainingsst();
            $newTrainingsst = $Trainingsst->create($request->input());
            
            return response()->json([
                'data' => [
                    'testingsst' => $newTrainingsst,
                ],
                'message' => 'Capacitación creadá correctamente!'
            ], 201);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Algo salio mal!', 'error' => $e], 403);
        }        
    }

    public function update(Request $request, int $id)
    {
        if ($id) {
            try {
                $trainingsst = Trainingsst::findOrFail($id);
                if (auth()->check()) {
                    $rules = [                        
                        $this->topic        => 'required|string',
                        $this->date         => 'required|string',
                        $this->hours        => 'required|numeric',
                        $this->assistants   => 'required|numeric',
                        $this->report_id    => 'required|numeric',                        
                    ];
                    $validator = Validator::make($request->all(), $rules);
                    if ($validator->fails()) {
                        throw (new ValidationException($validator->errors()->getMessages()));
                    }

                    $trainingsst->topic = $request->topic ?? $trainingsst->topic;
                    $trainingsst->date = $request->date ?? $trainingsst->date;
                    $trainingsst->hours = $request->hours ?? $trainingsst->hours;
                    $trainingsst->assistants = $request->assistants ?? $trainingsst->assistants;
                    $trainingsst->report_id = $request->report_id ?? $trainingsst->report_id;
                    $trainingsst->approved = $request->approved ?? $trainingsst->approved;

                    $trainingsst->save();
                    return response()->json([
                        'data' => [
                            'trainingsst' => $trainingsst,                            
                        ],
                        'message' => 'Capacitación actualizada con éxito!'
                    ], 201);
                }   
                
            } catch (ModelNotFoundException $ex) {
                return response()->json(['message' => "Capacitación con id {$id} no existe!", 'error' => $ex->getMessage()], 404);
            } catch (\Exception $e) {
                return response()->json(['message' => 'Algo salio mal!', 'error' => $e], 403);
            }
        }
        return response()->json(['message' => "Capacitación con id {$id} no existe!", 'error' => 'No se suministrado un id valido'], 404);        
    }

    public function destroy(int $id)
    {
        if ($id) {
            try {
                $trainingsst = Trainingsst::findOrFail($id);            
                $trainingsst->delete();
                return response()->json([
                    'data' => [
                        'trainingsst' => $trainingsst,
                    ],
                    'message' => 'Capacitación eliminada exitosamente!'
                ], 201);
    
            } catch (ModelNotFoundException $e) {
                return response()->json(['message' => "Capacitación con id {$id} no existe!", 'error' => $e->getMessage()], 403);
            }
        }
        return response()->json(['message' => "Capacitación con id {$id} no existe!", 'error' => 'No se suministrado un id valido'], 404);    
    }
    
    public function showByReportId(Request $request, int $id){
        if ($id) {
            try {

                return response()->json([
                    //'data' => Trainingsst::where('report_id',$id)->get(),
                    'data' => Trainingsst::query()->reportid($id)->get(),
                    'message' => 'Capacitaciónes Consultadas correctamente'
                ], 200);
                
            } catch (ModelNotFoundException $e) {
                return response()->json(['message' => "Capacitación con id {$id} no existe!", 'error' => $e->getMessage()], 403);
            }
        }
        return response()->json(['message' => "Capacitación con id {$id} no existe!", 'error' => 'No se suministrado un id valido'], 404);        
    }

}
