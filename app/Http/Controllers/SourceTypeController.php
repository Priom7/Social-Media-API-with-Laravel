<?php

namespace App\Http\Controllers;

use App\Models\SourceType;
use Illuminate\Http\Request;

class SourceTypeController extends Controller
{

    public function __construct()
    {
        $this->middleware('JWT');
    }
}
