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
    public function index(Request $req){
        $id = Auth::user()->id;
        $type = $req->type == null ?  'd' : $req->type;
        if($id == 3){
        $accreditations = accreditation::join('users as u1','accreditations.notary_id', '=', 'u1.id')
            ->leftJoin('users as u2','accreditations.user_id', '=', 'u2.registration_number')
            ->select('u1.name as notary_name','u2.name as client_name','accreditations.*')
            ->get()
            ->groupBy(function($date) use ($type) {return Carbon::parse($date->created_at)->format($type); });
        $loans = loan::
              join('users as u1','loans.notary_id', '=', 'u1.id')
            ->leftJoin('users as u2','loans.user_id', '=', 'u2.registration_number')
            ->select('u1.name as notary_name','u2.name as client_name','loans.*' )
            ->get()
            ->groupBy(function($date) use ($type) {return Carbon::parse($date->created_at)->format($type); });
        }
        else{
        $accreditations = accreditation::leftJoin('users', 'users.registration_number', '=', 'accreditations.user_id')
            ->select('users.name','accreditations.*')
            ->where('notary_id', $id)
            ->get()
            ->groupBy(function($date) use ($type) {return Carbon::parse($date->created_at)->format($type); });
        $loans = loan::leftJoin('users', 'users.registration_number', '=', 'loans.user_id')
            ->select('users.name','loans.*')
            ->where('notary_id', $id)
            ->get()
            ->groupBy(function($date) use ($type) {return Carbon::parse($date->created_at)->format($type); });
        }
        return view('contract/report/report',['accreditations' => $accreditations,'loans' => $loans ,'type' => $type]);
    }
}
