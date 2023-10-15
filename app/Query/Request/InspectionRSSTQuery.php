<?php

namespace App\Query\Request;

use Illuminate\Http\Request;
use App\Query\Abstraction\IInspectionRSSTQuery;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\ModelNotFoundException;

use Illuminate\Validation\ValidationException;
use App\Model\Core\Compromise;

use App\Model\Core\Report;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;

class InspectionRSSTQuery implements IInspectionRSSTQuery
{

    private $work = 'work';
    private $machines = 'machines';
    private $vehicles = 'vehicles';
    private $tools = 'tools';
    private $epp = 'epp';
    private $cleanliness = 'cleanliness';
    private $chemicals = 'chemicals';
    private $risk_work = 'risk_work';
    private $emergency_item = 'emergency_item';
    private $other = 'other';
    private $report_id = 'report_id';

    public function index(Request $request)
    {
    }

    public function store(Request $request)
    {
    }

    public function update(Request $request, int $id)
    {
    }

    public function destroy(int $id)
    {
    }

    public function showByReportId(Request $request, int $id)
    {
    }
}
