<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Query\Abstraction\ICompromiseRSSTEvidenceQuery;

class CompromiseRSSTEvidenceController extends Controller
{
    private $CompromiseRSSTEvidenceQuery;

    public function __construct(ICompromiseRSSTEvidenceQuery $CompromiseRSSTEvidenceQuery)
    {
        $this->CompromiseRSSTEvidenceQuery = $CompromiseRSSTEvidenceQuery;
    }

        /**
     * @OA\Post(
     *      path="/compromisersstevidence/store",
     *      operationId="storeReport",
     *      tags={"CompromiseRSSTEvidence"},
     *      summary="Store Report",
     *      description="Store Report",
     *      security={ {"bearer": {} }},
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/CompromiseEvidence")
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
        return $this->CompromiseRSSTEvidenceQuery->store($request);
    }

    /**
     * @OA\Get(
     *      path="/compromisersstevidence/showbycompromiseevidenceid/{id}",
     *      operationId="get CompromiseEvidence",
     *      tags={"CompromiseRSSTEvidence"},
     *      summary="Get One CompromiseEvidence",
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
    public function showByCompromiseEvidenceId(Request $request, $id)
    {
        return $this->CompromiseRSSTEvidenceQuery->showByCompromiseEvidenceId($request, $id);
    }

    /**
     * @OA\Get(
     *      path="/compromisersstevidence/showbycompromiseid/{id}",
     *      operationId="get ComromiseEvidence",
     *      tags={"CompromiseRSSTEvidence"},
     *      summary="Get One CompromiseEvidence",
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
    public function showByCompromiseId(Request $request, $id)
    {
        return $this->CompromiseRSSTEvidenceQuery->showByCompromiseId($request, $id);
    }

    /**
     * @OA\Put(
     *      path="/compromisersstevidence/update/{id}",
     *      operationId="getUpdateEvidenceById",
     *      tags={"CompromiseRSSTEvidence"},
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
        return $this->CompromiseRSSTEvidenceQuery->update($request, $id);
    }

    /**
     * @OA\Delete(
     *      path="/compromisersstevidence/destroy/{id}",
     *      operationId="getDestroyEvidenceById",
     *      tags={"CompromiseRSSTEvidence"},
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
        return $this->CompromiseRSSTEvidenceQuery->destroy($id);
    }



}