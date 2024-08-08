<?php

namespace App\Query\Request;

use App\Model\Core\EmployeeDocumentation;
use Illuminate\Http\Request;

use Illuminate\Validation\ValidationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Validator;
use App\Query\Abstraction\IEmployeeDocumentationQuery;

class EmployeeDocumentationQuery implements IEmployeeDocumentationQuery {
    
    private $name = 'name';
    private $file = 'file';
    private $type = 'type';
    private $approved = 'approved';
    private $employee_id = 'employee_id';

    public function index(Request $request){
        try {
            $evidences = EmployeeDocumentation::select(['id', 'file', 'approved', 'employee_id'])
                ->orderBy('id', $request->sort ?? 'ASC')
                ->paginate($request->limit ?? 10, ['*'], '', $request->page ?? 1);

            return response()->json([
                'data' => [
                    'evidence' => $evidences,
                ],
                'message' => 'Datos de Documentación Consultados Correctamente!'
            ], 201);

        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], 402);
        }
    }

    public function store(Request $request){

        $rules = [
            $this->name => 'required|string|min:1|max:128|',
            $this->file   => 'required',
            $this->type   => 'required',
            $this->employee_id   => 'required'
        ];
        try {

            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                throw (new ValidationException($validator->errors()->getMessages()));
            }

            // Creamos la nueva evidencia
            $evidence = new EmployeeDocumentation();             
            $newDocument = $evidence->create($request->input());

            return response()->json([
                'data' => [
                    'evidence' => $newDocument,
                ],
                'message' => 'Documento creadó correctamente!'
            ], 201);
 

        } catch (\Exception $e) {
            return response()->json(['message' => 'Algo salio mal!', 'error' => $e], 403);
        }       
    }

    public function update(Request $request, int $id){

        if ($id) {
            try {
                $evidence = EmployeeDocumentation::findOrFail($id);
                
                if (auth()->check()) {
                    $rules = [                        
                        $this->name => 'required|string|min:1|max:128|',
                        $this->type => 'required|string|min:1|max:128|',
                        
                        $this->employee_id   => 'numeric',
                        
                    ];
                    $validator = Validator::make($request->all(), $rules);
                    if ($validator->fails()) {
                        throw (new ValidationException($validator->errors()->getMessages()));
                    }
                                        
                    $evidence->name = $request->name ?? $evidence->name;
                    $evidence->type = $request->type ?? $evidence->type;
                    $evidence->approved = $request->approved ? 1 : 0;
                    $evidence->employee_id = $request->employee_id ?? $evidence->employee_id;
                    
                    $evidence->save();
                    return response()->json([
                        'data' => [
                            'evidence' => $evidence,                            
                        ],
                        'message' => 'Documento actualizado con éxito!'
                    ], 201);
                } else {
                    return response()->json(['message' => 'No tienes permiso para actualizar la Evidencia!'], 403);
                }
                
            } catch (ModelNotFoundException $ex) {
                return response()->json(['message' => "Documento con id {$id} no existe!", 'error' => $ex->getMessage()], 404);
            } catch (\Exception $e) {
                return response()->json(['message' => 'Algo salio mal!', 'error' => $e], 403);
            }
        }
        return response()->json(['message' => "Documento con id {$id} no existe!", 'error' => 'No se suministrado un id valido'], 404);
    

    }

    public function destroy(Int $id){
        try {
            $evidence = EmployeeDocumentation::findOrFail($id);
            
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
                'message' => 'Documento eliminado exitosamente!'
            ], 201);
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => "Documento con id {$id} no existe!", 'error' => $e->getMessage()], 403);
        }
    }

    public function showByEmployeeDocumentId(Request $request, int $id){
        if ($id) {
            try {
                $evidence = EmployeeDocumentation::select(
                    'id',
                    'name',
                    'file',
                    'type',
                    'approved',
                    'employee_id'
                )
                ->where('employee_id',$id)
                ->get();
                
                return response()->json([
                    'data' => [
                        'evidence' => $evidence                     
                    ],
                    'message' => 'Datos de Documento consultados Correctamente!'
                ], 201);
            } catch (ModelNotFoundException $e) {
                return response()->json(['message' => "Documento con id {$id} no existe!", 'error' => $e->getMessage()], 403);
            }
        }
    }

    public function showByEmployeeId(Request $request, int $id){
        if ($id) {
            try {
                $evidence = EmployeeDocumentation::select(
                    'id',
                    'name',
                    'file',
                    'type',
                    'approved',
                    'employee_id'
                )
                ->where('employee_id',$id)
                ->get();
                
                return response()->json([
                    'data' => [
                        'evidence' => $evidence                     
                    ],
                    'message' => 'Datos de Documento consultados Correctamente!'
                ], 201);
            } catch (ModelNotFoundException $e) {
                return response()->json(['message' => "Documento con id {$id} no existe!", 'error' => $e->getMessage()], 403);
            }
        }
    }
    
}
