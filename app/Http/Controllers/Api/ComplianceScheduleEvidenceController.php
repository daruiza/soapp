<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Query\Abstraction\IComplianceScheduleEvidenceQuery;

class ComplianceScheduleEvidenceController extends Controller
{
    private $ComplianceScheduleEvidenceQuery;

    public function __construct(IComplianceScheduleEvidenceQuery $ComplianceScheduleEvidenceQuery)
    {
        $this->ComplianceScheduleEvidenceQuery = $ComplianceScheduleEvidenceQuery;
    }

        /**
     * @OA\Post(
     *      path="/complianceschedule/store",
     *      operationId="storeReport",
     *      tags={"ComplianceScheduleEvidence"},
     *      summary="Store Report",
     *      description="Store Report",
     *      security={ {"bearer": {} }},
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/ComplianceScheduleEvidence")
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
        return $this->ComplianceScheduleEvidenceQuery->store($request);
    }

    /**
     * @OA\Get(
     *      path="/complianceschedule/showbycompromiseevidenceid/{id}",
     *      operationId="get ComplianceScheduleEvidence",
     *      tags={"ComplianceScheduleEvidence"},
     *      summary="Get One ComplianceScheduleEvidence",
     *      description="Return Commerce",
     *      security={ {"bearer": {} }},
     *      @OA\Parameter(
     *          name="id",
     *          description="training sst evedence Id",
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
    public function showByComplianceScheduleEvidenceId(Request $request, $id)
    {
        return $this->ComplianceScheduleEvidenceQuery->showByComplianceScheduleEvidenceId($request, $id);
    }

    /**
     * @OA\Get(
     *      path="/complianceschedule/showbycompromiseid/{id}",
     *      operationId="get ComromiseEvidence",
     *      tags={"ComplianceScheduleEvidence"},
     *      summary="Get One ComplianceScheduleEvidence",
     *      description="Return Commerce",
     *      security={ {"bearer": {} }},
     *      @OA\Parameter(
     *          name="id",
     *          description="Training SST Id",
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
    public function showByComplianceScheduleId(Request $request, $id)
    {
        return $this->ComplianceScheduleEvidenceQuery->showByComplianceScheduleId($request, $id);
    }

    /**
     * @OA\Put(
     *      path="/complianceschedule/update/{id}",
     *      operationId="getUpdateEvidenceById",
     *      tags={"ComplianceScheduleEvidence"},
     *      summary="Update One ComplianceScheduleEvidence By one Id",
     *      description="Update One ComplianceScheduleEvidence",
     *      security={ {"bearer": {} }},
     *      @OA\Parameter(
     *          name="id",
     *          description="ComplianceScheduleEvidence Id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *       @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/ComplianceScheduleEvidence")
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
        return $this->ComplianceScheduleEvidenceQuery->update($request, $id);
    }

    /**
     * @OA\Delete(
     *      path="/complianceschedule/destroy/{id}",
     *      operationId="getDestroyEvidenceById",
     *      tags={"ComplianceScheduleEvidence"},
     *      summary="Delete One ComplianceScheduleEvidence By one Id",
     *      description="Delete One ComplianceScheduleEvidence",
     *      security={ {"bearer": {} }},
     *      @OA\Parameter(
     *          name="id",
     *          description="ComplianceScheduleEvidence Id",
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
        return $this->ComplianceScheduleEvidenceQuery->destroy($id);
    }



}