<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Query\Abstraction\ISupportGroupActivityEvidenceQuery;

class SupportGroupActivityEvidenceController extends Controller
{
    private $SupportGroupActivityEvidenceQuery;

    public function __construct(ISupportGroupActivityEvidenceQuery $SupportGroupActivityEvidenceQuery)
    {
        $this->SupportGroupActivityEvidenceQuery = $SupportGroupActivityEvidenceQuery;
    }

        /**
     * @OA\Post(
     *      path="/supportgroupactivitiyevidence/store",
     *      operationId="storeEvidence",
     *      tags={"SupportGroupActivityEvidence"},
     *      summary="Store Support Group Activity Report",
     *      description="Store Support Group Activity Report",
     *      security={ {"bearer": {} }},
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/SupportGroupActivityEvidence")
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
        return $this->SupportGroupActivityEvidenceQuery->store($request);
    }

    /**
     * @OA\Get(
     *      path="/supportgroupactivitiyevidence/showbysupportgroupactivityevidenceid/{id}",
     *      operationId="get Support Group Activity",
     *      tags={"SupportGroupActivityEvidence"},
     *      summary="Get One Support Group Activity",
     *      description="Return Commerce",
     *      security={ {"bearer": {} }},
     *      @OA\Parameter(
     *          name="id",
     *          description="Support Group Activity RSST evedence Id",
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
    public function showBySupportGroupActivityEvidenceId(Request $request, $id)
    {
        return $this->SupportGroupActivityEvidenceQuery->showBySupportGroupActivityEvidenceId($request, $id);
    }

    /**
     * @OA\Get(
     *      path="/supportgroupactivitiyevidence/showbysupportgroupactivityid/{id}",
     *      operationId="get SupportGroupEvidences",
     *      tags={"SupportGroupActivityEvidence"},
     *      summary="Get One SupportGroupEvidence",
     *      description="Return SupportGroupEvidence",
     *      security={ {"bearer": {} }},
     *      @OA\Parameter(
     *          name="id",
     *          description="SupportGroupActivity RSST Id",
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
    public function showBySupportGroupActivityId(Request $request, $id)
    {
        return $this->SupportGroupActivityEvidenceQuery->showBySupportGroupActivityId($request, $id);
    }

    /**
     * @OA\Put(
     *      path="/supportgroupactivitiyevidence/update/{id}",
     *      operationId="getUpdateEvidenceById",
     *      tags={"SupportGroupActivityEvidence"},
     *      summary="Update One SupportGroupEvidence By one Id",
     *      description="Update One SupportGroupEvidence",
     *      security={ {"bearer": {} }},
     *      @OA\Parameter(
     *          name="id",
     *          description="SupportGroupEvidence Id",
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
        return $this->SupportGroupActivityEvidenceQuery->update($request, $id);
    }

    /**
     * @OA\Delete(
     *      path="/supportgroupactivitiyevidence/destroy/{id}",
     *      operationId="getDestroyEvidenceById",
     *      tags={"SupportGroupActivityEvidence"},
     *      summary="Delete One SupportGroupEvidence By one Id",
     *      description="Delete One SupportGroupEvidence",
     *      security={ {"bearer": {} }},
     *      @OA\Parameter(
     *          name="id",
     *          description="SupportGroupEvidence Id",
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
        return $this->SupportGroupActivityEvidenceQuery->destroy($id);
    }



}