<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\loan;
use App\accreditation;
use App\User;
use App\confirmation;
class search extends Controller
{
    private $user;
    //Inject the $user module and store it in our private variable.
    public function __construct(User $user)
    {
        $this->middleware('auth');
        $this->user = $user;
    }
    public function contract(Request $req){
        $type = Auth::user()->type;
        $id = Auth::user()->id;
        $search = $req->search; // by id : 1
        $user = User::pluck('registration_number');
        if(Auth::user()->type==3){
            $loan = loan::where('id',$search)->get();
            $accreditation = accreditation::where('id',$search)->get();
        }
        else if(Auth::user()->type == 1){
            $loan = loan::where('user_id', Auth::user()->registration_number)->where('id',$search)->get();
            $accreditation = accreditation::where('user_id', Auth::user()->registration_number)->where('id',$search)->get();
        }
        else{
            $loan = loan::where('notary_id', $id)->where('id',$search)->get();
            $accreditation = accreditation::where('notary_id', $id)->where('id',$search)->get();
        }
        return view('notary/contract',['accreditations'=>$accreditation,'loans'=>$loan,'users'=>$user, 'search'=> $search]);
    }
    public function request(Request $req){
        $search = $req->search;
            $confirmation = confirmation::join('users', 'users.id', '=', 'confirmations.notary_id')
            ->select('users.*','confirmations.*','confirmations.id as conf_id')
            ->where('registration_number', 'like', '%'.$search.'%')
            ->orWhere('name', 'like', '%'.$search.'%')
            ->orWhere('email', 'like', '%'.$search.'%')
            ->orWhere('phone', 'like', '%'.$search.'%')
            ->orderBy('status', 'desc')
            ->get();
            return view('admin/request',['confirmation'=>$confirmation]);
    }
    public function user(Request $req){
        $search = $req->search;
        $users = $this->user->where('registration_number', 'like', '%'.$search.'%')
        ->orWhere('name', 'like', '%'.$search.'%')->get();
        return view('admin/user',['users'=>$users]);
    }
}
