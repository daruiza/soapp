<?php

namespace App\Query\Request;

use App\Model\Core\InspectionRSSTEvidence;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;

use App\Query\Abstraction\IInspectionRSSTEvidenceQuery;

class InspectionRSSTEvidenceQuery implements IInspectionRSSTEvidenceQuery
{
    private $name = 'name';
    private $file = 'file';
    private $type = 'type';
    private $approved = 'approved';
    private $inspection_id = 'inspection_id';    
    
    public function store(Request $request){
        
        $rules = [
            $this->name => 'required|string|min:1|max:128|',
            $this->file   => 'required',
            $this->type   => 'required',
            $this->inspection_id   => 'required'
        ];
        try {

            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                throw (new ValidationException($validator->errors()->getMessages()));
            }

            // Creamos la nueva evidencia
            $evidence = new InspectionRSSTEvidence();             
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
                $evidence = InspectionRSSTEvidence::findOrFail($id);
                
                if (auth()->check()) {
                    $rules = [                        
                        $this->name                 => 'required|string|min:1|max:128|',
                        $this->type                 => 'required|string|min:1|max:128|',
                        $this->approved             => 'numeric',
                        $this->inspection_id   => 'numeric',
                        
                    ];
                    $validator = Validator::make($request->all(), $rules);
                    if ($validator->fails()) {
                        throw (new ValidationException($validator->errors()->getMessages()));
                    }
                                        
                    $evidence->name = $request->name ?? $evidence->name;
                    $evidence->type = $request->type ?? $evidence->type;
                    $evidence->approved = $request->approved ?? $evidence->approved;
                    $evidence->inspection_id = $request->inspection_id ?? $evidence->inspection_id;
                    
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
        return response()->json(['message' => "CompromiseEvidence con id {$id} no existe!", 'error' => 'No se suministrado un id valido'], 404);
    }

    public function destroy(int $id) {
        try {
            $evidence = InspectionRSSTEvidence::findOrFail($id);
            
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

    public function showByInspectionEvidenceId(Request $request, int $id){
        
        if ($id) {
            try {
                $evidence = InspectionRSSTEvidence::select(
                    'id',
                    'name',
                    'file',
                    'type',
                    'approved',
                    'inspection_id'
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

    public function showByInspectionId(Request $request, int $id){        
        if ($id) {
            try {
                $evidence = InspectionRSSTEvidence::select(
                    'id',
                    'name',
                    'file',
                    'type',
                    'approved',
                    'inspection_id'
                )
                ->where('inspection_id',$id)
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