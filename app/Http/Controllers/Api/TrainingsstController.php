<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Query\Abstraction\ITrainingsstQuery;
use Illuminate\Http\Request;

class TrainingsstController extends Controller
{
    private $TrainingsstQuery;

    public function __construct(ITrainingsstQuery $TrainingsstQuery)
    {
        $this->TrainingsstQuery = $TrainingsstQuery;
    }

    /**
     * @OA\Get(
     *      path="/trainingsst/index",
     *      operationId="getTraining",
     *      tags={"TrainingSST"},
     *      summary="Get All Training",
     *      description="Return Training",
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
        return $this->TrainingsstQuery->index($request);
    }

    /**
     * @OA\Post(
     *      path="/trainingsst/store",
     *      operationId="StoreTraining",
     *      tags={"TrainingSST"},
     *      summary="Store A Training",
     *      description="Store Training",
     *      security={ {"bearer": {} }},
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/Trainingsst")
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
        return $this->TrainingsstQuery->store($request);
    }

    /**
     * @OA\Put(
     *      path="/trainingsst/update/{id}",
     *      operationId="getUpdateTrainingSSTById",
     *      tags={"TrainingSST"},
     *      summary="Update One TrainingSST By one Id",
     *      description="Update One TrainingSST",
     *      security={ {"bearer": {} }},
     *      @OA\Parameter(
     *          name="id",
     *          description="TrainingSST Id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *       @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/Trainingsst")
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
        return $this->TrainingsstQuery->update($request, $id);
    }

        /**
     * @OA\Delete(
     *      path="/trainingsst/destroy/{id}",
     *      operationId="getDestroyTrainingSSTById",
     *      tags={"TrainingSST"},
     *      summary="Delete One TrainingSST By one Id",
     *      description="Delete One TrainingSST",
     *      security={ {"bearer": {} }},
     *      @OA\Parameter(
     *          name="id",
     *          description="TrainingSST Id",
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
        return $this->TrainingsstQuery->destroy($id);
    }

       /**
     * @OA\Get(
     *      path="/trainingsst/showbyreportid/{id}",
     *      operationId="getTrainingSSTById",
     *      tags={"TrainingSST"},
     *      summary="Get One TrainingSST By one Id",
     *      description="Return One TrainingSST",
     *      security={ {"bearer": {} }},
     *      @OA\Parameter(
     *          name="id",
     *          description="TrainingSST Id",
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
        return $this->TrainingsstQuery->showByReportId($request, $id);
    }



}
