<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\loan;
use App\accreditation;
use Carbon\Carbon;
use Auth;
class report extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        return view('contract/report/report');
    }
}
