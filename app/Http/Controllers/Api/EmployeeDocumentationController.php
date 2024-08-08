<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Query\Abstraction\IEmployeeDocumentationQuery;

class EmployeeDocumentationController extends Controller
{
    private $EmployeeDocumentationQuery;

    public function __construct(IEmployeeDocumentationQuery $EmployeeDocumentationQuery)
    {
        $this->EmployeeDocumentationQuery = $EmployeeDocumentationQuery;
    }

    /**
     * @OA\Post(
     *      path="/empleyeedocumentation/store",
     *      operationId="storeEmployeeDocumentation",
     *      tags={"EmployeeDocumentation"},
     *      summary="Store EmployeeDocumentation",
     *      description="Store EmployeeDocumentation",
     *      security={ {"bearer": {} }},
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/EmployeeDocumentation")
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
        return $this->EmployeeDocumentationQuery->store($request);
    }

    /**
     * @OA\Get(
     *      path="/empleyeedocumentation/showbyemployeedocumentid/{id}",
     *      operationId="get Documentation",
     *      tags={"EmployeeDocumentation"},
     *      summary="Get One Documentation",
     *      description="Return Documentation",
     *      security={ {"bearer": {} }},
     *      @OA\Parameter(
     *          name="id",
     *          description="Evidence Id",
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
    public function showByEmployeeDocumentId(Request $request, $id)
    {
        return $this->EmployeeDocumentationQuery->showByEmployeeDocumentId($request, $id);
    }

    /**
     * @OA\Get(
     *      path="/empleyeedocumentation/showbyemployeeid/{id}",
     *      operationId="get Documentation",
     *      tags={"EmployeeDocumentation"},
     *      summary="Get One Documentation",
     *      description="Return Documentation",
     *      security={ {"bearer": {} }},
     *      @OA\Parameter(
     *          name="id",
     *          description="Employee Id",
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
    public function showByEmployeeId(Request $request, $id)
    {
        return $this->EmployeeDocumentationQuery->showByEmployeeId($request, $id);
    }

     /**
     * @OA\Put(
     *      path="/empleyeedocumentation/update/{id}",
     *      operationId="getUpdateEvidenceById",
     *      tags={"EmployeeDocumentation"},
     *      summary="Update One Documentation By one Id",
     *      description="Update One Evidence",
     *      security={ {"bearer": {} }},
     *      @OA\Parameter(
     *          name="id",
     *          description="Documentation Id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *       @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/EmployeeDocumentation")
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
        return $this->EmployeeDocumentationQuery->update($request, $id);
    }

     /**
     * @OA\Delete(
     *      path="/empleyeedocumentation/destroy/{id}",
     *      operationId="getDestroyDocumentationById",
     *      tags={"EmployeeDocumentation"},
     *      summary="Delete One Documentation By one Id",
     *      description="Delete One Documentation",
     *      security={ {"bearer": {} }},
     *      @OA\Parameter(
     *          name="id",
     *          description="Documentation Id",
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
        return $this->EmployeeDocumentationQuery->destroy($id);
    }


}