<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\loan;
use App\accreditation;
use App\User;

class search extends Controller
{
    public function contract(Request $req){
        $type = Auth::user()->type;
        $id = Auth::user()->id;
        $search = $req->search; // by id : 1
        $user = User::pluck('registration_number');
        // Notary
        if($type == 2){
           $loan = loan::where('id',$search)->where('notary_id', $id)->get();
           $accreditation = accreditation::where('id',$search)->where('notary_id', $id)->get();
        }
        // Admin, Client
        else{

        }
        return view('notary/contract',['accreditations'=>$accreditation,'loans'=>$loan,'users'=>$user]);
    }
}
