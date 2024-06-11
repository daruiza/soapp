<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Query\Abstraction\ICompromiseSSTQuery;
use Illuminate\Http\Request;

class CompromiseSSTController extends Controller
{
    private $CompromiseSSTQuery;

    public function __construct(ICompromiseSSTQuery $CompromiseSSTQuery)
    {
        $this->CompromiseSSTQuery = $CompromiseSSTQuery;
    }

    /**
     * @OA\Get(
     *      path="/compromisesst/index",
     *      operationId="getCompromise",
     *      tags={"CompromiseSST"},
     *      summary="Get All Compromise",
     *      description="Return Compromise",
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
        return $this->CompromiseSSTQuery->index($request);
    }

    /**
     * @OA\Post(
     *      path="/compromisesst/store",
     *      operationId="StoreCompromise",
     *      tags={"CompromiseSST"},
     *      summary="Store A Compromise",
     *      description="Store Compromise",
     *      security={ {"bearer": {} }},
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/Compromise")
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
    public function store(Request $request)
    {
        return $this->CompromiseSSTQuery->store($request);
    }

    /**
     * @OA\Put(
     *      path="/compromisesst/update/{id}",
     *      operationId="getUpdateCompromiseById",
     *      tags={"CompromiseSST"},
     *      summary="Update One Compromise By one Id",
     *      description="Update One Compromise",
     *      security={ {"bearer": {} }},
     *      @OA\Parameter(
     *          name="id",
     *          description="Compromise Id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *       @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/Compromise")
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
        return $this->CompromiseSSTQuery->update($request, $id);
    }

        /**
     * @OA\Delete(
     *      path="/compromisesst/destroy/{id}",
     *      operationId="getDestroyCompromiseById",
     *      tags={"CompromiseSST"},
     *      summary="Delete One Compromise By one Id",
     *      description="Delete One Compromise",
     *      security={ {"bearer": {} }},
     *      @OA\Parameter(
     *          name="id",
     *          description="Compromise Id",
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
        return $this->CompromiseSSTQuery->destroy($id);
    }

       /**
     * @OA\Get(
     *      path="/compromisesst/showbyreportid/{id}",
     *      operationId="getCompromiseById",
     *      tags={"CompromiseSST"},
     *      summary="Get One Compromise By one Id",
     *      description="Return One Compromise",
     *      security={ {"bearer": {} }},
     *      @OA\Parameter(
     *          name="id",
     *          description="Compromise Id",
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
        return $this->CompromiseSSTQuery->showByReportId($request, $id);
    }



}
