<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\confirmation;
use App\User;
use Carbon\Carbon;
use Auth;
use App\Role;
class notaryConfirm extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        $notary_id = Auth::user()->id;
        $confirmation = confirmation::where('notary_id', $notary_id)->first();
        if($confirmation) return view('notary/confirm',['confirmation'=>$confirmation]);
        else return view('notary/confirm',['confirmation'=>'false']);
        
    }
    public function confirm(Request $request){
        // hash image name and upload
        $imageName = Str::random(25).'.'.request()->file->getClientOriginalExtension();
        request()->file->move(public_path('image/upload'), $imageName);
        $path = "/image/upload/".$imageName;
        // save confirmation information
        $confirmation = new confirmation();
        $confirmation->picture = $path;
        $confirmation->notary_id = $request->user;
        $confirmation->created_at = Carbon::now()->format('Y-m-d H:i:s');
        $confirmation->updated_at = Carbon::now()->format('Y-m-d H:i:s');
        $confirmation->save();
        return redirect('/confirm');
    }
    public function all(Request $request){
        $confirmation = confirmation::join('users', 'users.id', '=', 'confirmations.notary_id')
        ->select('users.*','confirmations.*','confirmations.id as conf_id')
        ->orderBy('status', 'desc')
        ->get();
        return view('admin/request',['confirmation'=>$confirmation]);
    }
    public function find($id){
        $confirmation = confirmation::join('users', 'users.id', '=', 'confirmations.notary_id')
        ->where('confirmations.id','=',$id)
        ->select('users.*','confirmations.*','confirmations.id as conf_id')
        ->get();
        return response()->json($confirmation[0]);
    }
    public function switch(Request $request){
        $user_id = $request->user_id;
        $request_id = $request->id;
        if($request->status == 0){
            $user = User::find($request->user_id);
            $user->roles()->detach();
            $user->confirmed = '0';
            $user->type = '2';
            $user->save();
            $user->roles()->attach(Role::where('name','user')->first());
            $req = confirmation::find($request_id);
            $req->status = '1';
            $req->save();
            return redirect('/request');
        }
        else{
            $user = User::find($request->user_id);
            $user->roles()->detach();
            $user->confirmed = '1';
            $user->type = '2';
            $user->save();
            $user->roles()->attach(Role::where('name','notary')->first());
            $req = confirmation::find($request_id);
            $req->status = '0';
            $req->save();
            return redirect('/request');
        }
    }
    public function delete(Request $request){
        $confirmation_id = $request->confirmation;
        $notary_id = $request->notary;
        $user = User::find($notary_id);
        $user->roles()->detach();
        $user->confirmed = '0';
        $user->save();
        $user->roles()->attach(Role::where('name','user')->first());
        $req = confirmation::find($confirmation_id);
        $req->delete();
        return 'ok';
    }
}
