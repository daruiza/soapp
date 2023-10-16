<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Query\Abstraction\IInspectionRSSTQuery;
use Illuminate\Http\Request;

class InspectionRSSTController extends Controller
{
    private $InspectionRSSTQuery;

    public function __construct(IInspectionRSSTQuery $InspectionRSSTQuery)
    {
        $this->InspectionRSSTQuery = $InspectionRSSTQuery;
    }

    /**
     * @OA\Get(
     *      path="/inspectionrsst/index",
     *      operationId="getInspection",
     *      tags={"Inspection"},
     *      summary="Get All Inspection",
     *      description="Return Inspection",
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
        return $this->InspectionRSSTQuery->index($request);
    }

    /**
     * @OA\Post(
     *      path="/inspectionrsst/store",
     *      operationId="StoreInspection",
     *      tags={"Inspection"},
     *      summary="Store A Inspection",
     *      description="Store Inspection",
     *      security={ {"bearer": {} }},
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/InspectionRSST")
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
        return $this->InspectionRSSTQuery->store($request);
    }

    /**
     * @OA\Put(
     *      path="/inspectionrsst/update/{id}",
     *      operationId="getUpdateInspectionById",
     *      tags={"Inspection"},
     *      summary="Update One Inspection By one Id",
     *      description="Update One Inspection",
     *      security={ {"bearer": {} }},
     *      @OA\Parameter(
     *          name="id",
     *          description="Inspection Id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *       @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/InspectionRSST")
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
        return $this->InspectionRSSTQuery->update($request, $id);
    }

    /**
     * @OA\Delete(
     *      path="/inspectionrsst/destroy/{id}",
     *      operationId="getDestroyInspectionById",
     *      tags={"Inspection"},
     *      summary="Delete One Inspection By one Id",
     *      description="Delete One Inspection",
     *      security={ {"bearer": {} }},
     *      @OA\Parameter(
     *          name="id",
     *          description="Inspection Id",
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
        return $this->InspectionRSSTQuery->destroy($id);
    }

    /**
     * @OA\Get(
     *      path="/inspectionrsst/showbyreportid/{id}",
     *      operationId="getInspectionById",
     *      tags={"Inspection"},
     *      summary="Get One Inspection By one Id",
     *      description="Return One Inspection",
     *      security={ {"bearer": {} }},
     *      @OA\Parameter(
     *          name="id",
     *          description="Inspection Id",
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
        return $this->InspectionRSSTQuery->showByReportId($request, $id);
    }
}
