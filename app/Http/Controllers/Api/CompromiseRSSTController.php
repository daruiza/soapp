<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Query\Abstraction\ICompromiseRSSTQuery;
use Illuminate\Http\Request;

class CompromiseRSSTController extends Controller
{
    private $CompromiseRSSTQuery;

    public function __construct(ICompromiseRSSTQuery $CompromiseRSSTQuery)
    {
        $this->CompromiseRSSTQuery = $CompromiseRSSTQuery;
    }

    /**
     * @OA\Get(
     *      path="/compromisersst/index",
     *      operationId="getCompromise",
     *      tags={"CompromiseRSST"},
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
        return $this->CompromiseRSSTQuery->index($request);
    }

    /**
     * @OA\Post(
     *      path="/compromisersst/store",
     *      operationId="StoreCompromise",
     *      tags={"CompromiseRSST"},
     *      summary="Store A Compromise",
     *      description="Store Compromise",
     *      security={ {"bearer": {} }},
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/CompromiseRSST")
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
        return $this->CompromiseRSSTQuery->store($request);
    }

    /**
     * @OA\Put(
     *      path="/compromisersst/update/{id}",
     *      operationId="getUpdateCompromiseById",
     *      tags={"CompromiseRSST"},
     *      summary="Update One Compromise By one Id",
     *      description="Update One Compromise",
     *      security={ {"bearer": {} }},
     *      @OA\Parameter(
     *          name="id",
     *          description="CompromiseRSST Id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *       @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/CompromiseRSST")
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
        return $this->CompromiseRSSTQuery->update($request, $id);
    }

        /**
     * @OA\Delete(
     *      path="/compromisersst/destroy/{id}",
     *      operationId="getDestroyCompromiseById",
     *      tags={"CompromiseRSST"},
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
        return $this->CompromiseRSSTQuery->destroy($id);
    }

       /**
     * @OA\Get(
     *      path="/compromisersst/showbyreportid/{id}",
     *      operationId="getCompromiseById",
     *      tags={"CompromiseRSST"},
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
        return $this->CompromiseRSSTQuery->showByReportId($request, $id);
    }



}
