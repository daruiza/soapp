<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Query\Abstraction\IComplianceScheduleQuery;
use Illuminate\Http\Request;

class ComplianceScheduleController extends Controller
{
    private $ComplianceScheduleQuery;

    public function __construct(IComplianceScheduleQuery $ComplianceScheduleQuery)
    {
        $this->ComplianceScheduleQuery = $ComplianceScheduleQuery;
    }

    /**
     * @OA\Get(
     *      path="/complianceschedule/index",
     *      operationId="getComplianceSchedule",
     *      tags={"ComplianceSchedule"},
     *      summary="Get All ComplianceSchedule",
     *      description="Return ComplianceSchedule",
     *      security={ {"bearer": {} }},
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
    public function index(Request $request)
    {
        return $this->ComplianceScheduleQuery->index($request);
    }

    /**
     * @OA\Post(
     *      path="/complianceschedule/store",
     *      operationId="StoreComplianceSchedule",
     *      tags={"ComplianceSchedule"},
     *      summary="Store A ComplianceSchedule",
     *      description="Store ComplianceSchedule",
     *      security={ {"bearer": {} }},
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/ComplianceSchedule")
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
    public function store(Request $request)
    {
        return $this->ComplianceScheduleQuery->store($request);
    }

    /**
     * @OA\Put(
     *      path="/complianceschedule/update/{id}",
     *      operationId="getUpdateComplianceScheduleById",
     *      tags={"ComplianceSchedule"},
     *      summary="Update One ComplianceSchedule By one Id",
     *      description="Update One ComplianceSchedule",
     *      security={ {"bearer": {} }},
     *      @OA\Parameter(
     *          name="id",
     *          description="ComplianceSchedule Id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *       @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/ComplianceSchedule")
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
        return $this->ComplianceScheduleQuery->update($request, $id);
    }

        /**
     * @OA\Delete(
     *      path="/complianceschedule/destroy/{id}",
     *      operationId="getDestroyComplianceScheduleById",
     *      tags={"ComplianceSchedule"},
     *      summary="Delete One ComplianceSchedule By one Id",
     *      description="Delete One ComplianceSchedule",
     *      security={ {"bearer": {} }},
     *      @OA\Parameter(
     *          name="id",
     *          description="ComplianceSchedule Id",
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
        return $this->ComplianceScheduleQuery->destroy($id);
    }

       /**
     * @OA\Get(
     *      path="/complianceschedule/showbyreportid/{id}",
     *      operationId="getComplianceScheduleById",
     *      tags={"ComplianceSchedule"},
     *      summary="Get One ComplianceSchedule By one Id",
     *      description="Return One ComplianceSchedule",
     *      security={ {"bearer": {} }},
     *      @OA\Parameter(
     *          name="id",
     *          description="ComplianceSchedule Id",
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
    public function showByReportId(Request $request, $id)
    {
        return $this->ComplianceScheduleQuery->showByReportId($request, $id);
    }



}
