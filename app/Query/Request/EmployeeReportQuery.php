<?php

namespace App\Query\Request;

use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use Carbon\Carbon;use App\Model\Core\EmployeeReport;

use App\Query\Abstraction\IEmployeeReportQuery;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class EmployeeReportQuery implements IEmployeeReportQuery
{
    
    public function index(Request $request)
    {
       
    }

    public function store(Request $request)
    {
        
       
    }

    public function update(Request $request, Int $id)
    {
      
    }

    
    public function destroy(Int $id)
    {
       
    }
}
