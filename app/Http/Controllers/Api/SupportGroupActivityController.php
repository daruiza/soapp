<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Query\Abstraction\ICorrectiveMonitoringRSSTQuery;
use Illuminate\Http\Request;

class SupportGroupActivityController extends Controller
{
    private $CorrectiveMonitoringRSSTQuery;

    public function __construct(ICorrectiveMonitoringRSSTQuery $CorrectiveMonitoringQuery)
    {
        $this->CorrectiveMonitoringRSSTQuery = $CorrectiveMonitoringQuery;
    }

    /**
     * @OA\Get(
     *      path="/correctiversst/index",
     *      operationId="getCorrective",
     *      tags={"CorrectiveMonitoringRSST"},
     *      summary="Get All Corrective",
     *      description="Return Corrective",
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
        return $this->CorrectiveMonitoringRSSTQuery->index($request);
    }

    /**
     * @OA\Post(
     *      path="/correctiversst/store",
     *      operationId="StoreCorrective",
     *      tags={"CorrectiveMonitoringRSST"},
     *      summary="Store A Corrective",
     *      description="Store Corrective",
     *      security={ {"bearer": {} }},
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/CorrectiveMonitoringRSST")
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
        return $this->CorrectiveMonitoringRSSTQuery->store($request);
    }

    /**
     * @OA\Put(
     *      path="/correctiversst/update/{id}",
     *      operationId="getUpdateCorrectiveById",
     *      tags={"CorrectiveMonitoringRSST"},
     *      summary="Update One Corrective By one Id",
     *      description="Update One Corrective",
     *      security={ {"bearer": {} }},
     *      @OA\Parameter(
     *          name="id",
     *          description="Corrective Id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *       @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/CorrectiveMonitoringRSST")
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
        return $this->CorrectiveMonitoringRSSTQuery->update($request, $id);
    }

    /**
     * @OA\Delete(
     *      path="/correctiversst/destroy/{id}",
     *      operationId="getDestroyCorrectveById",
     *      tags={"CorrectiveMonitoringRSST"},
     *      summary="Delete One Corrective By one Id",
     *      description="Delete One Corrective",
     *      security={ {"bearer": {} }},
     *      @OA\Parameter(
     *          name="id",
     *          description="Corrective Id",
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
        return $this->CorrectiveMonitoringRSSTQuery->destroy($id);
    }

    /**
     * @OA\Get(
     *      path="/correctiversst/showbyreportid/{id}",
     *      operationId="getCorrectiveById",
     *      tags={"CorrectiveMonitoringRSST"},
     *      summary="Get One Corrective By one Id",
     *      description="Return One Corrective",
     *      security={ {"bearer": {} }},
     *      @OA\Parameter(
     *          name="id",
     *          description="Report Id",
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
        return $this->CorrectiveMonitoringRSSTQuery->showByReportId($request, $id);
    }
}
