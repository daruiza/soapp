<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Query\Abstraction\ITrainingsstEvidenceQuery;

class TrainingsstEvidenceController extends Controller
{
    private $TrainingsstEvidenceQuery;

    public function __construct(ITrainingsstEvidenceQuery $TrainingsstEvidenceQuery)
    {
        $this->TrainingsstEvidenceQuery = $TrainingsstEvidenceQuery;
    }

        /**
     * @OA\Post(
     *      path="/trainingsstevidence/store",
     *      operationId="storeReport",
     *      tags={"TrainingsstEvidence"},
     *      summary="Store Report",
     *      description="Store Report",
     *      security={ {"bearer": {} }},
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/TrainingsstEvidence")
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
        return $this->TrainingsstEvidenceQuery->store($request);
    }

    /**
     * @OA\Get(
     *      path="/trainingsstevidence/showbytrainingsstevidenceid/{id}",
     *      operationId="get TrainingsstEvidence",
     *      tags={"TrainingsstEvidence"},
     *      summary="Get One TrainingsstEvidence",
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
    public function showByTrainingsstEvidenceId(Request $request, $id)
    {
        return $this->TrainingsstEvidenceQuery->showByTrainingsstEvidenceId($request, $id);
    }

    /**
     * @OA\Get(
     *      path="/trainingsstevidence/showbytrainingsstid/{id}",
     *      operationId="get TrainingsstEvidence",
     *      tags={"TrainingsstEvidence"},
     *      summary="Get One TrainingsstEvidence",
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
    public function showByTrainigsstId(Request $request, $id)
    {
        return $this->TrainingsstEvidenceQuery->showByTrainigsstId($request, $id);
    }

    /**
     * @OA\Put(
     *      path="/trainingsstevidence/update/{id}",
     *      operationId="getUpdateEvidenceById",
     *      tags={"TrainingsstEvidence"},
     *      summary="Update One TrainingsstEvidence By one Id",
     *      description="Update One TrainingsstEvidence",
     *      security={ {"bearer": {} }},
     *      @OA\Parameter(
     *          name="id",
     *          description="TrainingsstEvidence Id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *       @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/TrainingsstEvidence")
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
        return $this->TrainingsstEvidenceQuery->update($request, $id);
    }

    /**
     * @OA\Delete(
     *      path="/trainingsstevidence/destroy/{id}",
     *      operationId="getDestroyEvidenceById",
     *      tags={"TrainingsstEvidence"},
     *      summary="Delete One TrainingsstEvidence By one Id",
     *      description="Delete One TrainingsstEvidence",
     *      security={ {"bearer": {} }},
     *      @OA\Parameter(
     *          name="id",
     *          description="TrainingsstEvidence Id",
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
        return $this->TrainingsstEvidenceQuery->destroy($id);
    }



}