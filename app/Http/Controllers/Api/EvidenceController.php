<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Query\Abstraction\IEvidenceQuery;

class EvidenceController extends Controller
{
    private $EvidenceQuery;

    public function __construct(IEvidenceQuery $EvidenceQuery)
    {
        $this->EvidenceQuery = $EvidenceQuery;
    }

        /**
     * @OA\Post(
     *      path="/evidence/store",
     *      operationId="storeReport",
     *      tags={"ReportEvidence"},
     *      summary="Store Report",
     *      description="Store Report",
     *      security={ {"bearer": {} }},
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/Evidence")
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
        return $this->EvidenceQuery->store($request);
    }

    /**
     * @OA\Get(
     *      path="/evidence/showbyevidenceid/{id}",
     *      operationId="get Evidence",
     *      tags={"ReportEvidence"},
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
        return $this->EvidenceQuery->showByEvidenceId($request, $id);
    }

    /**
     * @OA\Get(
     *      path="/evidence/showbyempoyeereportid/{id}",
     *      operationId="get Evidence",
     *      tags={"ReportEvidence"},
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
    public function showByReportId(Request $request, $id)
    {
        return $this->EvidenceQuery->showByReportId($request, $id);
    }

    /**
     * @OA\Put(
     *      path="/evidence/update/{id}",
     *      operationId="getUpdateEvidenceById",
     *      tags={"ReportEvidence"},
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
     *          @OA\JsonContent(ref="#/components/schemas/Evidence")
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
        return $this->EvidenceQuery->update($request, $id);
    }

    /**
     * @OA\Delete(
     *      path="/evidence/destroy/{id}",
     *      operationId="getDestroyEvidenceById",
     *      tags={"ReportEvidence"},
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
        return $this->EvidenceQuery->destroy($id);
    }



}