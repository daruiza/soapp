<?php

namespace App\Query\Abstraction;

use Illuminate\Http\Request;

interface IRolQuery {    
    public function index(Request $request);    
}
