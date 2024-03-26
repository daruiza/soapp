<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Query\Abstraction\IEmployeeEvidenceQuery;

class EmployeeEvidenceController extends Controller
{
    private $EmployeeEvidenceQuery;

    public function __construct(IEmployeeEvidenceQuery $EmployeeEvidenceQuery)
    {
        $this->EmployeeEvidenceQuery = $EmployeeEvidenceQuery;
    }

        /**
     * @OA\Post(
     *      path="/evidence/store",
     *      operationId="storeReport",
     *      tags={"EmployeeEvidence"},
     *      summary="Store Report",
     *      description="Store Report",
     *      security={ {"bearer": {} }},
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/EmployeeEvidence")
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *       ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      )
     *     )
     */
    public function store(Request $request)
    {
        return $this->EmployeeEvidenceQuery->store($request);
    }

    /**
     * @OA\Get(
     *      path="/evidence/showbyevidenceid/{id}",
     *      operationId="get Evidence",
     *      tags={"EmployeeEvidence"},
     *      summary="Get One Evidence",
     *      description="Return Commerce",
     *      security={ {"bearer": {} }},
     *      @OA\Parameter(
     *          name="id",
     *          description="Evidence Id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *       ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated"
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      )
     *     )
     */
    public function showByEvidenceId(Request $request, $id)
    {
        return $this->EmployeeEvidenceQuery->showByEvidenceId($request, $id);
    }

    /**
     * @OA\Get(
     *      path="/evidence/showbyempoyeereportid/{id}",
     *      operationId="get Evidence",
     *      tags={"EmployeeEvidence"},
     *      summary="Get One Evidence",
     *      description="Return Commerce",
     *      security={ {"bearer": {} }},
     *      @OA\Parameter(
     *          name="id",
     *          description="Employee Report Id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *       ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated"
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      )
     *     )
     */
    public function showByEmployeeReportId(Request $request, $id)
    {
        return $this->EmployeeEvidenceQuery->showByEmployeeReportId($request, $id);
    }

    /**
     * @OA\Put(
     *      path="/evidence/update/{id}",
     *      operationId="getUpdateEvidenceById",
     *      tags={"EmployeeEvidence"},
     *      summary="Update One Evidence By one Id",
     *      description="Update One Evidence",
     *      security={ {"bearer": {} }},
     *      @OA\Parameter(
     *          name="id",
     *          description="Evidence Id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *       @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/EmployeeEvidence")
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *       ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated"
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      )
     *     )
     */
    public function update(Request $request, $id)
    {
        return $this->EmployeeEvidenceQuery->update($request, $id);
    }

    /**
     * @OA\Delete(
     *      path="/evidence/destroy/{id}",
     *      operationId="getDestroyEvidenceById",
     *      tags={"EmployeeEvidence"},
     *      summary="Delete One Evidence By one Id",
     *      description="Delete One Evidence",
     *      security={ {"bearer": {} }},
     *      @OA\Parameter(
     *          name="id",
     *          description="Evidence Id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *       ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated"
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      )
     *     )
     */
    public function destroy($id)
    {
        return $this->EmployeeEvidenceQuery->destroy($id);
    }



}