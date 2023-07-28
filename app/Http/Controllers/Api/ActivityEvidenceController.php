<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Query\Abstraction\IActivityEvidenceQuery;

class ActivityEvidenceController extends Controller
{
    private $ActivityEvidenceQuery;

    public function __construct(IActivityEvidenceQuery $ActivityEvidenceQuery)
    {
        $this->ActivityEvidenceQuery = $ActivityEvidenceQuery;
    }

        /**
     * @OA\Post(
     *      path="/activityevidence/store",
     *      operationId="storeReport",
     *      tags={"ActivityEvidence"},
     *      summary="Store Report",
     *      description="Store Report",
     *      security={ {"bearer": {} }},
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/ActivityEvidence")
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
        return $this->ActivityEvidenceQuery->store($request);
    }

    /**
     * @OA\Get(
     *      path="/activityevidence/showbytrainingsstevidenceid/{id}",
     *      operationId="get ActivityEvidence",
     *      tags={"ActivityEvidence"},
     *      summary="Get One ActivityEvidence",
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
    public function showByActivityEvidenceId(Request $request, $id)
    {
        return $this->ActivityEvidenceQuery->showByActivityEvidenceId($request, $id);
    }

    /**
     * @OA\Get(
     *      path="/activityevidence/showbytrainingsstid/{id}",
     *      operationId="get ActivityEvidence",
     *      tags={"ActivityEvidence"},
     *      summary="Get One ActivityEvidence",
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
    public function showByActivityId(Request $request, $id)
    {
        return $this->ActivityEvidenceQuery->showByActivityId($request, $id);
    }

    /**
     * @OA\Put(
     *      path="/activityevidence/update/{id}",
     *      operationId="getUpdateEvidenceById",
     *      tags={"ActivityEvidence"},
     *      summary="Update One ActivityEvidence By one Id",
     *      description="Update One ActivityEvidence",
     *      security={ {"bearer": {} }},
     *      @OA\Parameter(
     *          name="id",
     *          description="ActivityEvidence Id",
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
        return $this->ActivityEvidenceQuery->update($request, $id);
    }

    /**
     * @OA\Delete(
     *      path="/activityevidence/destroy/{id}",
     *      operationId="getDestroyEvidenceById",
     *      tags={"ActivityEvidence"},
     *      summary="Delete One ActivityEvidence By one Id",
     *      description="Delete One ActivityEvidence",
     *      security={ {"bearer": {} }},
     *      @OA\Parameter(
     *          name="id",
     *          description="ActivityEvidence Id",
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
        return $this->ActivityEvidenceQuery->destroy($id);
    }



}