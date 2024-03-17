<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Query\Abstraction\ISupportGroupActivityQuery;
use Illuminate\Http\Request;

class SupportGroupActivityController extends Controller
{
    private $SupportGroupActivityQuery;

    public function __construct(ISupportGroupActivityQuery $SupportGroupActivityQuery)
    {
        $this->SupportGroupActivityQuery = $SupportGroupActivityQuery;
    }

    /**
     * @OA\Get(
     *      path="/supportgroupactivitiy/index",
     *      operationId="getSupport",
     *      tags={"SupportGroupAction"},
     *      summary="Get All Support",
     *      description="Return Support",
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
        return $this->SupportGroupActivityQuery->index($request);
    }

    /**
     * @OA\Post(
     *      path="/supportgroupactivitiy/store",
     *      operationId="StoreSupport",
     *      tags={"SupportGroupAction"},
     *      summary="Store A Support",
     *      description="Store Support",
     *      security={ {"bearer": {} }},
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/SupportGroupActivity")
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
        return $this->SupportGroupActivityQuery->store($request);
    }

    /**
     * @OA\Put(
     *      path="/supportgroupactivitiy/update/{id}",
     *      operationId="getUpdateSupportById",
     *      tags={"SupportGroupAction"},
     *      summary="Update One Support By one Id",
     *      description="Update One Support",
     *      security={ {"bearer": {} }},
     *      @OA\Parameter(
     *          name="id",
     *          description="Support Id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *       @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/SupportGroupActivity")
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
        return $this->SupportGroupActivityQuery->update($request, $id);
    }

    /**
     * @OA\Delete(
     *      path="/supportgroupactivitiy/destroy/{id}",
     *      operationId="getDestroyCorrectveById",
     *      tags={"SupportGroupAction"},
     *      summary="Delete One Support By one Id",
     *      description="Delete One Support",
     *      security={ {"bearer": {} }},
     *      @OA\Parameter(
     *          name="id",
     *          description="Support Id",
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
        return $this->SupportGroupActivityQuery->destroy($id);
    }

    /**
     * @OA\Get(
     *      path="/supportgroupactivitiy/showbyreportid/{id}",
     *      operationId="getSupportById",
     *      tags={"SupportGroupAction"},
     *      summary="Get One Support By one Id",
     *      description="Return One Support",
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
        return $this->SupportGroupActivityQuery->showByReportId($request, $id);
    }
}
