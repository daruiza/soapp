<?php

namespace App\Query\Request;

use App\Model\Core\Evidence;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;


use App\Query\Abstraction\IEvidenceQuery;

class EvidenceQuery implements IEvidenceQuery
{
    private $name = 'name';
    private $file = 'file';
    private $approved = 'approved';
    private $employee_report_id = 'employee_report_id';

    public function index(Request $request){
        try {
            $evidences = Evidence::select(['id', 'file', 'approved', 'employee_report_id'])
                ->orderBy('id', $request->sort ?? 'ASC')
                ->paginate($request->limit ?? 10, ['*'], '', $request->page ?? 1);

            return response()->json([
                'data' => [
                    'evidence' => $evidences,
                ],
                'message' => 'Datos de Tiendas Consultados Correctamente!'
            ], 201);

        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], 402);
        }
    }
    
    public function store(Request $request){

        $rules = [
            $this->name => 'required|string|min:1|max:128|',
            $this->file   => 'required',
            $this->employee_report_id   => 'required'
        ];
        try {

            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                throw (new ValidationException($validator->errors()->getMessages()));
            }

            // Creamos el nuevo colaborador
            $evidence = new Evidence();             
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
    public function update(Request $request, int $id){}
    public function destroy(int $id){}
    public function showByEvidenceId(Request $request, int $id){}

    public function showByEmployeeReportId(Request $request, int $id){
        if ($id) {
            try {
                $evidence = Evidence::select(
                    'id',
                    'name',
                    'file',
                    'approved',
                    'employee_report_id'
                )
                ->where('employee_report_id',$id)
                ->get();
                
                return response()->json([
                    'data' => [
                        'evidence' => $evidence,
                    ],
                    'message' => 'Datos de Evidencia consultados Correctamente!'
                ], 201);
            } catch (ModelNotFoundException $e) {
                return response()->json(['message' => "Evidencia con id {$id} no existe!", 'error' => $e->getMessage()], 403);
            }
        }
    }
}