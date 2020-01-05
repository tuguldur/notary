<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\User;
use App\confirmation;
use App\Role;
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
            $user->roles()->detach();
        }
        if($request->type == 1){
            $user->roles()->attach(Role::where('name','user')->first());
        }
        if($request->type == 2){
            $user->roles()->attach(Role::where('name','notary')->first());
        }
        if($request->type == 3){
            $user->roles()->attach(Role::where('name','admin')->first());
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
        $user->roles()->detach();
        $confirmation = confirmation::where('notary_id','=',$id);
        $confirmation->delete();
        $user->delete();
        return "ok";
    }
}