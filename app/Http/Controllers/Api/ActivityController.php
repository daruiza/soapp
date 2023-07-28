<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Query\Abstraction\IActivityQuery;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    private $ActivityQuery;

    public function __construct(IActivityQuery $ActivityQuery)
    {
        $this->ActivityQuery = $ActivityQuery;
    }

    /**
     * @OA\Get(
     *      path="/activity/index",
     *      operationId="getActivity",
     *      tags={"Activity"},
     *      summary="Get All Activity",
     *      description="Return Activity",
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
        return $this->ActivityQuery->index($request);
    }

    /**
     * @OA\Post(
     *      path="/activity/store",
     *      operationId="StoreTraining",
     *      tags={"Activity"},
     *      summary="Store A Activity",
     *      description="Store Activity",
     *      security={ {"bearer": {} }},
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/Activity")
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
        return $this->ActivityQuery->store($request);
    }

    /**
     * @OA\Put(
     *      path="/activity/update/{id}",
     *      operationId="getUpdateTrainingSSTById",
     *      tags={"Activity"},
     *      summary="Update One Activity By one Id",
     *      description="Update One Activity",
     *      security={ {"bearer": {} }},
     *      @OA\Parameter(
     *          name="id",
     *          description="Activity Id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *       @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/Activity")
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
        return $this->ActivityQuery->update($request, $id);
    }

        /**
     * @OA\Delete(
     *      path="/activity/destroy/{id}",
     *      operationId="getDestroyTrainingSSTById",
     *      tags={"Activity"},
     *      summary="Delete One Activity By one Id",
     *      description="Delete One Activity",
     *      security={ {"bearer": {} }},
     *      @OA\Parameter(
     *          name="id",
     *          description="Activity Id",
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
        return $this->ActivityQuery->destroy($id);
    }

       /**
     * @OA\Get(
     *      path="/activity/showbyreportid/{id}",
     *      operationId="getTrainingSSTById",
     *      tags={"Activity"},
     *      summary="Get One Activity By one Id",
     *      description="Return One Activity",
     *      security={ {"bearer": {} }},
     *      @OA\Parameter(
     *          name="id",
     *          description="Activity Id",
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
        return $this->ActivityQuery->showByReportId($request, $id);
    }



}
