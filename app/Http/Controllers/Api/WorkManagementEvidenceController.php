<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Query\Abstraction\IWorkManagementEvidenceQuery;

class WorkManagementEvidenceController extends Controller
{
    private $WorkManagementEvidenceQuery;

    public function __construct(IWorkManagementEvidenceQuery $WorkManagementEvidenceQuery)
    {
        $this->WorkManagementEvidenceQuery = $WorkManagementEvidenceQuery;
    }

        /**
     * @OA\Post(
     *      path="/workmanagementevidence/store",
     *      operationId="storeEvidence",
     *      tags={"WorkManagementEvidence"},
     *      summary="Store Work Management Evidence Report",
     *      description="Store Work Management Evidence Report",
     *      security={ {"bearer": {} }},
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/WorkManagementEvidence")
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
        return $this->WorkManagementEvidenceQuery->store($request);
    }

    /**
     * @OA\Get(
     *      path="/workmanagementevidence/showbyworkmanagementevidenceid/{id}",
     *      operationId="get Work Management Evidence",
     *      tags={"WorkManagementEvidence"},
     *      summary="Get One Work Management Evidence",
     *      description="Return Commerce",
     *      security={ {"bearer": {} }},
     *      @OA\Parameter(
     *          name="id",
     *          description="Work Management Evidence evedence Id",
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
    public function showByWorkManagementEvidenceId(Request $request, $id)
    {
        return $this->WorkManagementEvidenceQuery->showByWorkManagementEvidenceId($request, $id);
    }

    /**
     * @OA\Get(
     *      path="/workmanagementevidence/showbyworkmanagementid/{id}",
     *      operationId="get SupportGroupEvidences",
     *      tags={"WorkManagementEvidence"},
     *      summary="Get One Work Management Evidence",
     *      description="Return Work Management Evidence",
     *      security={ {"bearer": {} }},
     *      @OA\Parameter(
     *          name="id",
     *          description="SupportGroupActivity Id",
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
    public function showByWorkManagementId(Request $request, $id)
    {
        return $this->WorkManagementEvidenceQuery->showByWorkManagementId($request, $id);
    }

    /**
     * @OA\Put(
     *      path="/workmanagementevidence/update/{id}",
     *      operationId="getUpdateEvidenceById",
     *      tags={"WorkManagementEvidence"},
     *      summary="Update One Work Management Evidence By one Id",
     *      description="Update One Work Management Evidence",
     *      security={ {"bearer": {} }},
     *      @OA\Parameter(
     *          name="id",
     *          description="Work Management Evidence Id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *       @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/WorkManagementEvidence")
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
        return $this->WorkManagementEvidenceQuery->update($request, $id);
    }

    /**
     * @OA\Delete(
     *      path="/workmanagementevidence/destroy/{id}",
     *      operationId="getDestroyEvidenceById",
     *      tags={"WorkManagementEvidence"},
     *      summary="Delete One Work Management Evidence By one Id",
     *      description="Delete One Work Management Evidence",
     *      security={ {"bearer": {} }},
     *      @OA\Parameter(
     *          name="id",
     *          description="Work Management Evidence Id",
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
        return $this->WorkManagementEvidenceQuery->destroy($id);
    }



}