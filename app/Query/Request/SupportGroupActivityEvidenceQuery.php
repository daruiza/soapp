<?php

namespace App\Query\Request;

use App\Model\Core\SupportGroupActivityEvidence;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;

use App\Query\Abstraction\ISupportGroupActivityEvidenceQuery;

class SupportGroupActivityEvidenceQuery implements ISupportGroupActivityEvidenceQuery
{
    private $name = 'name';
    private $file = 'file';
    private $type = 'type';
    private $approved = 'approved';
    private $support_group_id = 'support_group_id';    
    
    public function store(Request $request){
        
        $rules = [
            $this->name => 'required|string|min:1|max:128|',
            $this->file   => 'required',
            $this->type   => 'required',
            $this->support_group_id   => 'required'
        ];
        try {

            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                throw (new ValidationException($validator->errors()->getMessages()));
            }

            // Creamos la nueva evidencia
            $evidence = new SupportGroupActivityEvidence();             
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
                $evidence = SupportGroupActivityEvidence::findOrFail($id);
                
                if (auth()->check()) {
                    $rules = [                        
                        $this->name                 => 'required|string|min:1|max:128|',
                        $this->type                 => 'required|string|min:1|max:128|',                        
                        $this->support_group_id   => 'numeric',
                        
                    ];
                    $validator = Validator::make($request->all(), $rules);
                    if ($validator->fails()) {
                        throw (new ValidationException($validator->errors()->getMessages()));
                    }
                                        
                    $evidence->name = $request->name ?? $evidence->name;
                    $evidence->type = $request->type ?? $evidence->type;
                    $evidence->approved = $request->approved ? 1 : 0;
                    $evidence->support_group_id = $request->support_group_id ?? $evidence->support_group_id;
                    
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
            $evidence = SupportGroupActivityEvidence::findOrFail($id);
            
             // LLamado de delete de UploadQuery
             $request = new Request();
             $request->setMethod('DELETE');
             $request->request->add(['path' => $evidence->file]);
             UploadQuery::deleteFile($request);      
            
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

    public function showBySupportGroupActivityEvidenceId(Request $request, int $id){
        
        if ($id) {
            try {
                $evidence = SupportGroupActivityEvidence::select(
                    'id',
                    'name',
                    'file',
                    'type',
                    'approved',
                    'support_group_id'
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

    public function showBySupportGroupActivityId(Request $request, int $id){        
        if ($id) {
            try {
                $evidence = SupportGroupActivityEvidence::select(
                    'id',
                    'name',
                    'file',
                    'type',
                    'approved',
                    'support_group_id'
                )
                ->where('support_group_id',$id)
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