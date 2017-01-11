<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Period;

class PeriodController extends Controller
{
	 public function __construct()
    {
        $this->middleware('auth');
    }

    public function all()
    {
    	$periods = Period::all();
    	
    	return response()->json($periods->toArray());
    }
}
