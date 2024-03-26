<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Query\Abstraction\IInspectionRSSTEvidenceQuery;

class InspectionRSSTEvidenceController extends Controller
{
    private $InspectionRSSTEvidenceQuery;

    public function __construct(IInspectionRSSTEvidenceQuery $InspectionRSSTEvidenceQuery)
    {
        $this->InspectionRSSTEvidenceQuery = $InspectionRSSTEvidenceQuery;
    }

        /**
     * @OA\Post(
     *      path="/inspectionrsstevidence/store",
     *      operationId="storeEvidence",
     *      tags={"InspectionRSSTEvidence"},
     *      summary="Store Inspection Report",
     *      description="Store Inspection Report",
     *      security={ {"bearer": {} }},
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/InspectionEvidence")
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
        return $this->InspectionRSSTEvidenceQuery->store($request);
    }

    /**
     * @OA\Get(
     *      path="/inspectionrsstevidence/showbyinspectionevidenceid/{id}",
     *      operationId="get InspectionEvidence",
     *      tags={"InspectionRSSTEvidence"},
     *      summary="Get One InspectionEvidence",
     *      description="Return Commerce",
     *      security={ {"bearer": {} }},
     *      @OA\Parameter(
     *          name="id",
     *          description="InspectionEvidence RSST evedence Id",
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
    public function showByInspectionEvidenceId(Request $request, $id)
    {
        return $this->InspectionRSSTEvidenceQuery->showByInspectionEvidenceId($request, $id);
    }

    /**
     * @OA\Get(
     *      path="/inspectionrsstevidence/showbyinspectionid/{id}",
     *      operationId="get ComromiseEvidence",
     *      tags={"InspectionRSSTEvidence"},
     *      summary="Get One InspectionEvidence",
     *      description="Return Commerce",
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
    public function showByInspectionId(Request $request, $id)
    {
        return $this->InspectionRSSTEvidenceQuery->showByInspectionId($request, $id);
    }

    /**
     * @OA\Put(
     *      path="/inspectionrsstevidence/update/{id}",
     *      operationId="getUpdateEvidenceById",
     *      tags={"InspectionRSSTEvidence"},
     *      summary="Update One InspectionEvidence By one Id",
     *      description="Update One InspectionEvidence",
     *      security={ {"bearer": {} }},
     *      @OA\Parameter(
     *          name="id",
     *          description="InspectionEvidence Id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *       @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/InspectionEvidence")
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
        return $this->InspectionRSSTEvidenceQuery->update($request, $id);
    }

    /**
     * @OA\Delete(
     *      path="/inspectionrsstevidence/destroy/{id}",
     *      operationId="getDestroyEvidenceById",
     *      tags={"InspectionRSSTEvidence"},
     *      summary="Delete One InspectionEvidence By one Id",
     *      description="Delete One InspectionEvidence",
     *      security={ {"bearer": {} }},
     *      @OA\Parameter(
     *          name="id",
     *          description="InspectionEvidence Id",
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
        return $this->InspectionRSSTEvidenceQuery->destroy($id);
    }



}