<?php

namespace App\Query\Abstraction;

use Illuminate\Http\Request;

interface ISupportGroupActivityEvidenceQuery
{
    public function store(Request $request);
    public function update(Request $request, int $id);
    public function destroy(Int $id);
    public function showBySupportGroupActivityEvidenceId(Request $request, int $id);
    public function showBySupportGroupActivityId(Request $request, int $id);
}
