<?php

namespace App\Query\Abstraction;

use Illuminate\Http\Request;

interface IWorkManagementEvidenceQuery
{
    public function store(Request $request);
    public function update(Request $request, int $id);
    public function destroy(Int $id);
    public function showByWorkManagementEvidenceId(Request $request, int $id);
    public function showByWorkManagementId(Request $request, int $id);
}
