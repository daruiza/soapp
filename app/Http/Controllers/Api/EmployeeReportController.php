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
}