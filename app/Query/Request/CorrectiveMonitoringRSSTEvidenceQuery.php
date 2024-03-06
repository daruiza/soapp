<?php

namespace App\Query\Request;

use App\Model\Core\CorrectiveMonitoringRSSTEvidence;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;

use App\Query\Abstraction\ICorrectiveMonitoringRSSTEvidenceQuery;

class CorrectiveMonitoringRSSTEvidenceQuery implements ICorrectiveMonitoringRSSTEvidenceQuery
{
    private $name = 'name';
    private $file = 'file';
    private $type = 'type';
    private $approved = 'approved';
    private $corrective_id = 'corrective_id';    
    
    public function store(Request $request){
        
        $rules = [
            $this->name => 'required|string|min:1|max:128|',
            $this->file   => 'required',
            $this->type   => 'required',
            $this->corrective_id   => 'required'
        ];
        try {

            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                throw (new ValidationException($validator->errors()->getMessages()));
            }

            // Creamos la nueva evidencia
            $corrective = new CorrectiveMonitoringRSSTEvidence();             
            $newEvidence = $corrective->create($request->input());

            return response()->json([
                'data' => [
                    'corrective' => $newEvidence,
                ],
                'message' => 'Corrección creada correctamente!'
            ], 201);
 

        } catch (\Exception $e) {
            return response()->json(['message' => 'Algo salio mal!', 'error' => $e], 403);
        }       
    }
    
    public function update(Request $request, int $id)
    {
        if ($id) {
            try {
                $corrective = CorrectiveMonitoringRSSTEvidence::findOrFail($id);
                
                if (auth()->check()) {
                    $rules = [                        
                        $this->name                 => 'required|string|min:1|max:128|',
                        $this->type                 => 'required|string|min:1|max:128|',
                        $this->approved             => 'numeric',
                        $this->corrective_id   => 'numeric',
                        
                    ];
                    $validator = Validator::make($request->all(), $rules);
                    if ($validator->fails()) {
                        throw (new ValidationException($validator->errors()->getMessages()));
                    }
                                        
                    $corrective->name = $request->name ?? $corrective->name;
                    $corrective->type = $request->type ?? $corrective->type;
                    $corrective->approved = $request->approved ?? $corrective->approved;
                    $corrective->corrective_id = $request->corrective_id ?? $corrective->corrective_id;
                    
                    $corrective->save();
                    return response()->json([
                        'data' => [
                            'corrective' => $corrective,                            
                        ],
                        'message' => 'Corrección actualizado con éxito!'
                    ], 201);
                } else {
                    return response()->json(['message' => 'No tienes permiso para actualizar la Corrección!'], 403);
                }
                
            } catch (ModelNotFoundException $ex) {
                return response()->json(['message' => "Corrección con id {$id} no existe!", 'error' => $ex->getMessage()], 404);
            } catch (\Exception $e) {
                return response()->json(['message' => 'Algo salio mal!', 'error' => $e], 403);
            }
        }
        return response()->json(['message' => "Corrección con id {$id} no existe!", 'error' => 'No se suministrado un id valido'], 404);
    }

    public function destroy(int $id) {
        try {
            $corrective = CorrectiveMonitoringRSSTEvidence::findOrFail($id);
            
            // Eliminamos el archivo relacionado            
            if(File::exists(public_path($corrective->file))){
                File::delete(public_path($corrective->file));                
            } else {
                Log::notice('Borrar Archivo fallo: '.public_path($corrective->file));
            }            
            
            $corrective->delete();
            return response()->json([
                'data' => [
                    'corrective' => $corrective,
                ],
                'message' => 'Corrección eliminada exitosamente!'
            ], 201);
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => "Corrección con id {$id} no existe!", 'error' => $e->getMessage()], 403);
        }
    }

    public function showByCorrectiveMonitoringEvidenceId(Request $request, int $id){
        
        if ($id) {
            try {
                $corrective = CorrectiveMonitoringRSSTEvidence::select(
                    'id',
                    'name',
                    'file',
                    'type',
                    'approved',
                    'corrective_id'
                )
                ->where('id',$id)
                ->get();
                
                return response()->json([
                    'data' => [
                        'corrective' => $corrective                     
                    ],
                    'message' => 'Datos de Corrección consultados Correctamente!'
                ], 201);
            } catch (ModelNotFoundException $e) {
                return response()->json(['message' => "Corrección con id {$id} no existe!", 'error' => $e->getMessage()], 403);
            }
        }
    }

    public function showByCorrectiveMonitoringId(Request $request, int $id){        
        if ($id) {
            try {
                $corrective = CorrectiveMonitoringRSSTEvidence::select(
                    'id',
                    'name',
                    'file',
                    'type',
                    'approved',
                    'corrective_id'
                )
                ->where('corrective_id',$id)
                ->get();
                
                return response()->json([
                    'data' => [
                        'corrective' => $corrective                     
                    ],
                    'message' => 'Datos de Corrección consultados Correctamente!'
                ], 201);
            } catch (ModelNotFoundException $e) {
                return response()->json(['message' => "Corrección con id {$id} no existe!", 'error' => $e->getMessage()], 403);
            }
        }
    }
}