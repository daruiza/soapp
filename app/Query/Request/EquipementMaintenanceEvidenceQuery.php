<?php

namespace App\Query\Request;

use App\Model\Core\EquipementMaintenanceEvidence;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;

use App\Query\Abstraction\IEquipementMaintenanceEvidenceQuery;

class EquipementMaintenanceEvidenceQuery implements IEquipementMaintenanceEvidenceQuery
{
    private $name = 'name';
    private $file = 'file';
    private $type = 'type';
    private $approved = 'approved';
    private $equipement_id = 'equipement_id';    
    
    public function store(Request $request){
        
        $rules = [
            $this->name => 'required|string|min:1|max:128|',
            $this->file   => 'required',
            $this->type   => 'required',
            $this->equipement_id   => 'required'
        ];
        try {

            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                throw (new ValidationException($validator->errors()->getMessages()));
            }

            // Creamos la nueva evidencia
            $evidence = new EquipementMaintenanceEvidence();             
            $newEvidence = $evidence->create($request->input());

            return response()->json([
                'data' => [
                    'evidence' => $newEvidence,
                ],
                'message' => 'Evidencia creada correctamente!'
            ], 201);
 

        } catch (\Exception $e) {
            return response()->json(['message' => 'Algo salio mal!', 'error' => $e], 403);
        }       
    }
    
    public function update(Request $request, int $id)
    {
        if ($id) {
            try {
                $evidence = EquipementMaintenanceEvidence::findOrFail($id);
                
                if (auth()->check()) {
                    $rules = [                        
                        $this->name          => 'required|string|min:1|max:128|',
                        $this->type          => 'required|string|min:1|max:128|',                        
                        $this->equipement_id => 'numeric',
                        
                    ];
                    $validator = Validator::make($request->all(), $rules);
                    if ($validator->fails()) {
                        throw (new ValidationException($validator->errors()->getMessages()));
                    }
                                        
                    $evidence->name = $request->name ?? $evidence->name;
                    $evidence->type = $request->type ?? $evidence->type;
                    $evidence->approved = $request->approved ? 1 : 0;
                    $evidence->equipement_id = $request->equipement_id ?? $evidence->equipement_id;
                    
                    $evidence->save();
                    return response()->json([
                        'data' => [
                            'evidence' => $evidence,                            
                        ],
                        'message' => 'Evidencia actualizado con éxito!'
                    ], 201);
                } else {
                    return response()->json(['message' => 'No tienes permiso para actualizar la Evidencia!'], 403);
                }
                
            } catch (ModelNotFoundException $ex) {
                return response()->json(['message' => "Evidencia con id {$id} no existe!", 'error' => $ex->getMessage()], 404);
            } catch (\Exception $e) {
                return response()->json(['message' => 'Algo salio mal!', 'error' => $e], 403);
            }
        }
        return response()->json(['message' => "Evidencia con id {$id} no existe!", 'error' => 'No se suministrado un id valido'], 404);
    }

    public function destroy(int $id) {
        try {
            $evidence = EquipementMaintenanceEvidence::findOrFail($id);
            
            // Eliminamos el archivo relacionado            
            if(File::exists(public_path($evidence->file))){
                File::delete(public_path($evidence->file));                
            } else {
                Log::notice('Borrar Archivo fallo: '.public_path($evidence->file));
            }            
            
            $evidence->delete();
            return response()->json([
                'data' => [
                    'evidence' => $evidence,
                ],
                'message' => 'Evidencia eliminada exitosamente!'
            ], 201);
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => "Evidencia con id {$id} no existe!", 'error' => $e->getMessage()], 403);
        }
    }

    public function showByEquipementMaintenanceEvidenceId(Request $request, int $id){
        
        if ($id) {
            try {
                $evidence = EquipementMaintenanceEvidence::select(
                    'id',
                    'name',
                    'file',
                    'type',
                    'approved',
                    'equipement_id'
                )
                ->where('id',$id)
                ->get();
                
                return response()->json([
                    'data' => [
                        'evidence' => $evidence                     
                    ],
                    'message' => 'Datos de Evidencia consultados Correctamente!'
                ], 201);
            } catch (ModelNotFoundException $e) {
                return response()->json(['message' => "Evidencia con id {$id} no existe!", 'error' => $e->getMessage()], 403);
            }
        }
    }

    public function showByEquipementMaintenanceId(Request $request, int $id){        
        if ($id) {
            try {
                $evidence = EquipementMaintenanceEvidence::select(
                    'id',
                    'name',
                    'file',
                    'type',
                    'approved',
                    'equipement_id'
                )
                ->where('equipement_id',$id)
                ->get();
                
                return response()->json([
                    'data' => [
                        'evidence' => $evidence                     
                    ],
                    'message' => 'Datos de Evidencia consultados Correctamente!'
                ], 201);
            } catch (ModelNotFoundException $e) {
                return response()->json(['message' => "Evidencia con id {$id} no existe!", 'error' => $e->getMessage()], 403);
            }
        }
    }
}