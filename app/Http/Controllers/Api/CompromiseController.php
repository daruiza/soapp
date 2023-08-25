<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Query\Abstraction\ICompromiseQuery;
use Illuminate\Http\Request;

class CompromiseController extends Controller
{
    private $CompromiseQuery;

    public function __construct(ICompromiseQuery $CompromiseQuery)
    {
        $this->CompromiseQuery = $CompromiseQuery;
    }

    /**
     * @OA\Get(
     *      path="/compromise/index",
     *      operationId="getCompromise",
     *      tags={"Compromise"},
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
        return $this->CompromiseQuery->index($request);
    }

    /**
     * @OA\Post(
     *      path="/compromise/store",
     *      operationId="StoreCompromise",
     *      tags={"Compromise"},
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
        return $this->CompromiseQuery->store($request);
    }

    /**
     * @OA\Put(
     *      path="/compromise/update/{id}",
     *      operationId="getUpdateCompromiseById",
     *      tags={"Compromise"},
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
        return $this->CompromiseQuery->update($request, $id);
    }

        /**
     * @OA\Delete(
     *      path="/compromise/destroy/{id}",
     *      operationId="getDestroyCompromiseById",
     *      tags={"Compromise"},
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
        return $this->CompromiseQuery->destroy($id);
    }

       /**
     * @OA\Get(
     *      path="/compromise/showbyreportid/{id}",
     *      operationId="getCompromiseById",
     *      tags={"Compromise"},
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
        return $this->CompromiseQuery->showByReportId($request, $id);
    }



}
