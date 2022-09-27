<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Query\Abstraction\IRolQuery;
use Illuminate\Http\Request;

class RolController extends Controller
{
    private $RolQuery;

    public function __construct(IRolQuery $RolQuery)
    {
        $this->RolQuery = $RolQuery;
    }

    /**
     * @OA\Get(
     *      path="/rol/index",
     *      operationId="getAllRols",
     *      tags={"rol"},
     *      summary="Get All Rols",
     *      description="Return Rols",
     *      security={ {"bearer": {} }},
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
    public function index(Request $request)
    {
        return $this->RolQuery->index($request);
    }
}
