<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Query\Abstraction\ICompromiseSSTEvidenceQuery;

class CompromiseSSTEvidenceController extends Controller
{
    private $CompromiseSSTEvidenceQuery;

    public function __construct(ICompromiseSSTEvidenceQuery $CompromiseSSTEvidenceQuery)
    {
        $this->CompromiseSSTEvidenceQuery = $CompromiseSSTEvidenceQuery;
    }

        /**
     * @OA\Post(
     *      path="/compromisesstevidence/store",
     *      operationId="storeReport",
     *      tags={"CompromiseSSTEvidence"},
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
        return $this->CompromiseSSTEvidenceQuery->store($request);
    }

    /**
     * @OA\Get(
     *      path="/compromisesstevidence/showbycompromiseevidenceid/{id}",
     *      operationId="get CompromiseEvidence",
     *      tags={"CompromiseSSTEvidence"},
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
        return $this->CompromiseSSTEvidenceQuery->showByCompromiseEvidenceId($request, $id);
    }

    /**
     * @OA\Get(
     *      path="/compromisesstevidence/showbycompromiseid/{id}",
     *      operationId="get ComromiseEvidence",
     *      tags={"CompromiseSSTEvidence"},
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
        return $this->CompromiseSSTEvidenceQuery->showByCompromiseId($request, $id);
    }

    /**
     * @OA\Put(
     *      path="/compromisesstevidence/update/{id}",
     *      operationId="getUpdateEvidenceById",
     *      tags={"CompromiseSSTEvidence"},
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
        return $this->CompromiseSSTEvidenceQuery->update($request, $id);
    }

    /**
     * @OA\Delete(
     *      path="/compromisesstevidence/destroy/{id}",
     *      operationId="getDestroyEvidenceById",
     *      tags={"CompromiseSSTEvidence"},
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
        return $this->CompromiseSSTEvidenceQuery->destroy($id);
    }



}