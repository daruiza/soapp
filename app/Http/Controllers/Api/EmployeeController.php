<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Query\Abstraction\IEmployeeQuery;

class EmployeeController extends Controller
{

    private $EmployeeQuery;

    public function __construct(IEmployeeQuery $employeeQuery)
    {
        $this->EmployeeQuery = $employeeQuery;
    }

    /**
     * @OA\Get(
     *      path="/employee/index",
     *      operationId="getAllEmployees",
     *      tags={"Employee"},
     *      summary="Get All Employees",
     *      description="Return Employees",
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
    public function index()
    {
        return $this->EmployeeQuery->index();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return '';
    }

    /**
     * @OA\Post(
     *      path="/employee/store",
     *      operationId="storeEmployees",
     *      tags={"Employee"},
     *      summary="Store Employee",
     *      description="Store Employee",
     *      security={ {"bearer": {} }},
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/Employee")
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
        return $this->EmployeeQuery->store($request);
    }

    /**
     * @OA\Get(
     *      path="/employee/showbyemployeeid/{id}",
     *      operationId="getEmployeeById",
     *      tags={"Employee"},
     *      summary="Get One Employee By one Id",
     *      description="Return One Employee",
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
        return $this->EmployeeQuery->showByEmployeeId($request, $id);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return '';
    }

    /**
     * @OA\Put(
     *      path="/employee/update/{id}",
     *      operationId="getUpdateEmployeeById",
     *      tags={"Employee"},
     *      summary="Update One Employee By one Id",
     *      description="Update One Employee",
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
     *       @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/Employee")
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
        return $this->EmployeeQuery->update($request, $id);
    }

    /**
     * @OA\Delete(
     *      path="/employee/destroy/{id}",
     *      operationId="getDestroyEmplyeeById",
     *      tags={"Employee"},
     *      summary="Delete One Employee By one Id",
     *      description="Delete One Employee",
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
    public function destroy($id)
    {
        return $this->EmployeeQuery->destroy($id);
    }
}
