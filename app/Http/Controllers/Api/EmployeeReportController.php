<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Query\Abstraction\IEmployeeReportQuery;

class EmployeeReportController extends Controller
{

    private $EmployeeReportQuery;

    public function __construct(IEmployeeReportQuery $EmployeeReportQuery)
    {
        $this->EmployeeReportQuery = $EmployeeReportQuery;
    }

    public function index(Request $request)
    {
        return $this->EmployeeReportQuery->index($request);
    }

    /**
     * @OA\Post(
     *      path="/employeereport/store",
     *      operationId="storeEmployees",
     *      tags={"Employee Report"},
     *      summary="Store Employee Report",
     *      description="Store Employee Report",
     *      security={ {"bearer": {} }},
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/EmployeeReport")
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
        return $this->EmployeeReportQuery->store($request);
    }
}