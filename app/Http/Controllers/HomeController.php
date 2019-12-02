<?php

namespace App\Http\Controllers;
use App\loan;
use App\accreditation;
use App\User;
use Auth;
use App\confirmation;
class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {   
        $id = Auth::user()->id;
        if(Auth::user()->type == 3){
            $accreditation = count(accreditation::get());
            $loan = count(loan::get());
            $salary_loan = loan::sum('price');
            $salary_accreditation = accreditation::sum('price');
        }
        else if(Auth::user()->type == 1){
            $id = Auth::user()->registration_number;
            $loan = count(loan::where('user_id', $id)->get());
            $accreditation = count(accreditation::where('user_id', $id)->get());
            $salary_loan = loan::where('user_id', $id)->where('status',2)->sum('price');
            $salary_accreditation = accreditation::where('user_id', $id)->where('status',2)->sum('price');
        }
        else{
            $loan = count(loan::where('notary_id', $id)->get());
            $accreditation = count(accreditation::where('notary_id', $id)->get());
            $salary_loan = loan::where('notary_id', $id)->where('status',2)->sum('price');
            $salary_accreditation = accreditation::where('notary_id', $id)->where('status',2)->sum('price');
        }
        $confirmation = count(confirmation::where('status',1)->get());
        $user = count(User::get());
        $total_contracts = $accreditation + $loan;
        $salary = number_format($salary_accreditation + $salary_loan,2);
        return view('dashboard',['user' => $user, 'salary' => $salary, 'confirmation' => $confirmation, 'total_contracts' => $total_contracts]);
    }
}
