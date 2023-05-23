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
     *      tags={"Evidnece"},
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


}