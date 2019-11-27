<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Profile extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        return view('profile');
    }
    public function update(Request $request){
        $old_password = Auth::user()->password;
        $check_password = $request->old_password;
        $new_password = $request->new_password;
        if (Hash::check($check_password, $old_password)) 
        {
            $user = User::find(Auth::user()->id);
            $user->name = $request->username;
            $user->email = $request->email;
            $user->registration_number = strtoupper($request->registration_number);
            $user->address = $request->address;
            $user->password = bcrypt($request->password);
            $user->save();
            return response()->json(['status' => 'true']);
        }
        else{
            return response()->json(['status' => 'false']);
        }
    }
}
