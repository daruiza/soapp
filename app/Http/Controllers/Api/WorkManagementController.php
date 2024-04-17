<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Query\Abstraction\IWorkManagementQuery;
use Illuminate\Http\Request;

class WorkManagementController extends Controller
{
    private $WorkManagementQuery;

    public function __construct(IWorkManagementQuery $WorkManagementQuery)
    {
        $this->WorkManagementQuery = $WorkManagementQuery;
    }

    /**
     * @OA\Get(
     *      path="/workmanagement/index",
     *      operationId="getWork Management",
     *      tags={"WorkManagement"},
     *      summary="Get All Work Management",
     *      description="Return Work Management",
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
        return $this->WorkManagementQuery->index($request);
    }

    /**
     * @OA\Post(
     *      path="/workmanagement/store",
     *      operationId="StoreWork Management",
     *      tags={"WorkManagement"},
     *      summary="Store A Work Management",
     *      description="Store Work Management",
     *      security={ {"bearer": {} }},
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/WorkManagement")
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
        return $this->WorkManagementQuery->store($request);
    }

    /**
     * @OA\Put(
     *      path="/workmanagement/update/{id}",
     *      operationId="getUpdateWork ManagementById",
     *      tags={"WorkManagement"},
     *      summary="Update One Work Management By one Id",
     *      description="Update One Work Management",
     *      security={ {"bearer": {} }},
     *      @OA\Parameter(
     *          name="id",
     *          description="Work Management Id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *       @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/WorkManagement")
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
        return $this->WorkManagementQuery->update($request, $id);
    }

    /**
     * @OA\Delete(
     *      path="/workmanagement/destroy/{id}",
     *      operationId="getDestroyCorrectveById",
     *      tags={"WorkManagement"},
     *      summary="Delete One Work Management By one Id",
     *      description="Delete One Work Management",
     *      security={ {"bearer": {} }},
     *      @OA\Parameter(
     *          name="id",
     *          description="Work Management Id",
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
        return $this->WorkManagementQuery->destroy($id);
    }

    /**
     * @OA\Get(
     *      path="/workmanagement/showbyreportid/{id}",
     *      operationId="getWork ManagementById",
     *      tags={"WorkManagement"},
     *      summary="Get One Work Management By one Id",
     *      description="Return One Work Management",
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
        return $this->WorkManagementQuery->showByReportId($request, $id);
    }
}
