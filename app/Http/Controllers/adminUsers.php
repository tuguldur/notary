<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\User;
use App\confirmation;
class adminUsers extends Controller
{
    private $user;
    //Inject the $user module and store it in our private variable.
    public function __construct(User $user)
    {
        $this->middleware('auth');
        $this->user = $user;
    }
    // users mod
    public function index()
    {
        $users = $this->user->all();
        return view('admin/user',['users'=>$users]);
    }
    public function find($id)
    {
        $user = $this->user->find($id);
        return response()->json($user);
    }
    public function add(Request $request)
    {
        /*
            $user->name = "";
            $user->email = '';
            $user->registration_number = '';
            $user->type = '';// 1 = user; 2 = notary; 3 = admin;
            $user->password = bcrypt('');
            $user->created_at = Carbon::now()->format('Y-m-d H:i:s');
            $user->updated_at = Carbon::now()->format('Y-m-d H:i:s');
            $user->save();
        */
        $user;
        if ($request->id == 0) {
            $user                      = new User();
            $user->name                = $request->name;
            $user->email               = $request->email;
            $user->registration_number = mb_strtoupper($request->registration_number);
            $user->type                = $request->type;
            $user->phone               = $request->phone;
            $user->password            = bcrypt($request->password);
            $user->created_at          = Carbon::now()->format('Y-m-d H:i:s');
            $user->updated_at          = Carbon::now()->format('Y-m-d H:i:s');
            $user->save();
        } else {
            $user                      = User::find($request->id);
            $user->name                = $request->name;
            $user->email               = $request->email;
            $user->registration_number = mb_strtoupper($request->registration_number);
            $user->type                = $request->type;
            $user->phone               = $request->phone;
            $user->password            = $request->password ? bcrypt($request->password) : $user->password ;
            $user->updated_at          = Carbon::now()->format('Y-m-d H:i:s');
            $user->save();
        }
        return redirect('/user');
    }
    public function check_email(Request $req)
    {
        $email = $req->email;
        $user_id = $req->user_id;
        $check = User::where('id', '<>', $user_id)->where('email', $email)->first();
        if ($check) {
            return 'true';
        } else {
            return 'false';
        }
    }
    public function check_registration_number(Request $req)
    {
        $registration_number = $req->registration_number;
        $user_id = $req->user_id;
        $check = User::where('id', '<>', $user_id)->where('registration_number', $registration_number)->first();
        if ($check) {
            return 'true';
        } else {
            return 'false';
        }
    }
    
    public function delete($id)
    {
        $user = User::find($id);
        $confirmation = confirmation::where('notary_id','=',$id);
        $confirmation->delete();
        $user->delete();
        return "ok";
    }
}