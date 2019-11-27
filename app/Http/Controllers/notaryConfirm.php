<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\confirmation;
use Carbon\Carbon;
use Auth;
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
        $confirmation = confirmation::get();
        return view('notary/confirm',['confirmation'=>$confirmation]);
    }
}
