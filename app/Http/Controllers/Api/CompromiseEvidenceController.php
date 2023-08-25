<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Query\Abstraction\ICompromiseEvidenceQuery;

class CompromiseEvidenceController extends Controller
{
    private $CompromiseEvidenceQuery;

    public function __construct(ICompromiseEvidenceQuery $CompromiseEvidenceQuery)
    {
        $this->CompromiseEvidenceQuery = $CompromiseEvidenceQuery;
    }

        /**
     * @OA\Post(
     *      path="/compromiseevidence/store",
     *      operationId="storeReport",
     *      tags={"CompromiseEvidence"},
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
        return $this->CompromiseEvidenceQuery->store($request);
    }

    /**
     * @OA\Get(
     *      path="/compromiseevidence/showbycompromiseevidenceid/{id}",
     *      operationId="get CompromiseEvidence",
     *      tags={"CompromiseEvidence"},
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
        return $this->CompromiseEvidenceQuery->showByCompromiseEvidenceId($request, $id);
    }

    /**
     * @OA\Get(
     *      path="/compromiseevidence/showbycompromiseid/{id}",
     *      operationId="get ComromiseEvidence",
     *      tags={"CompromiseEvidence"},
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
        return $this->CompromiseEvidenceQuery->showByCompromiseId($request, $id);
    }

    /**
     * @OA\Put(
     *      path="/compromiseevidence/update/{id}",
     *      operationId="getUpdateEvidenceById",
     *      tags={"CompromiseEvidence"},
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
        return $this->CompromiseEvidenceQuery->update($request, $id);
    }

    /**
     * @OA\Delete(
     *      path="/compromiseevidence/destroy/{id}",
     *      operationId="getDestroyEvidenceById",
     *      tags={"CompromiseEvidence"},
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
        return $this->CompromiseEvidenceQuery->destroy($id);
    }



}