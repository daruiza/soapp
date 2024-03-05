<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Query\Abstraction\ICorrectiveMonitoringRSSTEvidenceQuery;

class CorrectiveMonitoringRSSTEvidenceController extends Controller
{
    private $CorrectiveMonitoringRSSTEvidenceQuery;

    public function __construct(ICorrectiveMonitoringRSSTEvidenceQuery $CorrectiveMonitoringRSSTEvidenceQuery)
    {
        $this->CorrectiveMonitoringRSSTEvidenceQuery = $CorrectiveMonitoringRSSTEvidenceQuery;
    }

        /**
     * @OA\Post(
     *      path="/correctivemonitoringrsstevidence/store",
     *      operationId="storeEvidence",
     *      tags={"CorrectiveMonitoringRSSTEvidence"},
     *      summary="Store Corrective Monitoring Report",
     *      description="Store Corrective Monitoring Report",
     *      security={ {"bearer": {} }},
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/CorrectiveMonitoringRSSTEvidence")
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
        return $this->CorrectiveMonitoringRSSTEvidenceQuery->store($request);
    }

    /**
     * @OA\Get(
     *      path="/correctivemonitoringrsstevidence/showbycorrectivemonitoringevidenceid/{id}",
     *      operationId="get Corrective Monitoring",
     *      tags={"CorrectiveMonitoringRSSTEvidence"},
     *      summary="Get One Corrective Monitoring",
     *      description="Return Commerce",
     *      security={ {"bearer": {} }},
     *      @OA\Parameter(
     *          name="id",
     *          description="Corrective Monitoring RSST evedence Id",
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
    public function showByCorrectiveMonitoringEvidenceId(Request $request, $id)
    {
        return $this->CorrectiveMonitoringRSSTEvidenceQuery->showByCorrectiveMonitoringEvidenceId($request, $id);
    }

    /**
     * @OA\Get(
     *      path="/correctivemonitoringrsstevidence/showbycorrectivemonitoringid/{id}",
     *      operationId="get CompromiseEvidences",
     *      tags={"CorrectiveMonitoringRSSTEvidences"},
     *      summary="Get One CompromiseEvidence",
     *      description="Return CompromiseEvidence",
     *      security={ {"bearer": {} }},
     *      @OA\Parameter(
     *          name="id",
     *          description="Ispection RSST Id",
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
    public function showByCorrectiveMonitoringId(Request $request, $id)
    {
        return $this->CorrectiveMonitoringRSSTEvidenceQuery->showByCorrectiveMonitoringId($request, $id);
    }

    /**
     * @OA\Put(
     *      path="/correctivemonitoringrsstevidence/update/{id}",
     *      operationId="getUpdateEvidenceById",
     *      tags={"CorrectiveMonitoringRSSTEvidence"},
     *      summary="Update One CompromiseEvidence By one Id",
     *      description="Update One CompromiseEvidence",
     *      security={ {"bearer": {} }},
     *      @OA\Parameter(
     *          name="id",
     *          description="CompromiseEvidence Id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *       @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/EvidenceUpdate")
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
        return $this->CorrectiveMonitoringRSSTEvidenceQuery->update($request, $id);
    }

    /**
     * @OA\Delete(
     *      path="/correctivemonitoringrsstevidence/destroy/{id}",
     *      operationId="getDestroyEvidenceById",
     *      tags={"CorrectiveMonitoringRSSTEvidence"},
     *      summary="Delete One CompromiseEvidence By one Id",
     *      description="Delete One CompromiseEvidence",
     *      security={ {"bearer": {} }},
     *      @OA\Parameter(
     *          name="id",
     *          description="CompromiseEvidence Id",
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
        return $this->CorrectiveMonitoringRSSTEvidenceQuery->destroy($id);
    }



}