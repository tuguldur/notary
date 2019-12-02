<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\loan;
use App\accreditation;
use Carbon\Carbon;
use Auth;
use App\User;
class contractController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        $notary_id = Auth::user()->id;
        $user = User::pluck('registration_number');
        if(Auth::user()->type==3){
            $loan = loan::get();
            $accreditation = accreditation::get();
        }
        else if(Auth::user()->type == 1){
            $loan = loan::where('user_id', Auth::user()->registration_number)->get();
            $accreditation = accreditation::where('user_id', Auth::user()->registration_number)->get();
        }
        else{
            $loan = loan::where('notary_id', $notary_id)->get();
            $accreditation = accreditation::where('notary_id', $notary_id)->get();
        }
        return view('notary/contract',['accreditations'=>$accreditation,'loans'=>$loan,'users'=>$user]);
    }
    public function accreditation(){
        return view('contract/create/accreditation');
    }
    public function loan(){
        return view('contract/create/loan');
    }
    public function save_accreditation(Request $req){
        $insert = array(
            'location' => $req->ex1loc,
            'province' => $req->ex1prov,
            'city' => $req->ex1city,
            'street' => $req->ex1street,
            'house_number' => $req->ex1numb,
            'number' => $req->ex1no,
            'lastname' => $req->ex1userlastname,
            'firstname' => $req->ex1userfirstname,
            'userreg_number' => $req->ex1userreg_number,
            'value' => $req->ex1text,
            'city2' => $req->ex1city1,
            'district' => $req->ex1stage,
            'khoroo' => $req->exloc1,
            'street2' => $req->ex1street1,
            'house_number2' => $req->ex1bnumber,
            'number2' => $req->ex1no1,
            'replastname' => $req->ex1representativelastname,
            'repfirstname' => $req->ex1representativefirstname,
            'timedate' => $req->ex1timedate,
            'repname' => $req->ex1Representativename,
            'rep_pass_number' => $req->ex1passwordnumber,
            'reg_number' => $req->ex1registernumber,
            'trusteename' => $req->ex1trusteename,
            'trusteepassnumber' => $req->ex1trusteepasswordnumber,
            'trusteeregnumber' => $req->ex1trusteeregisternumber,
            'price' => '10000',
            'status' => '1', // 1: төлбөр төлөх 2: баталгаажсан
            'notary_id' => $req->notary_id,
            'user_id' => 'хоосон',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        );
        accreditation::insert([$insert]);
        return redirect('/contract');
    }
    public function save_loan(Request $req){
        $insert = array(
            'location' => $req->ex2loc,
            'city' => $req->ex2city,
            'district' => $req->ex2dist,
            'khoroo' => $req->ex2khoroo,
            'user_regnumber' => $req->ex2user_regnumber,
            'lastname' => $req->ex2lastname,
            'firstname' => $req->ex2firstname,
            'city1' => $req->ex2city2,
            'district1' => $req->ex2dist1,
            'khoroo1' => $req->ex2khoroo1,
            'user_regnumber1' => $req->ex2user_regnumber1,
            'lastname1' => $req->ex2lastname1,
            'firstname1' => $req->ex2firstname1,
            'price1' => $req->ex2price1,
            'date1' => $req->ex2date,
            'date2' => $req->ex2date2,
            'date3' => $req->ex2date3,
            'price2' => $req->ex2price2,
            'date4' => $req->ex2date4,
            'hvv' => $req->ex2hv,
            'baritsaa' => $req->ex2baritsaa,
            'percent'=> $req->ex2perc,
            'exday' => $req->ex2exday,
            'lastname2' => $req->ex2lastname2,
            'firstname2' => $req->ex2firstname2,
            'location1' => $req->ex2location1,
            'phone_numbers' => $req->ex2phone_numbers,
            'password_number' => $req->ex2passnumber,
            'regnumber2' => $req->ex2reg_number2,
            'bankaccount' => $req->ex2bankaccount,
            'lastname3' => $req->ex2lastname3,
            'firstname3' => $req->ex2firstname3,
            'location2' => $req->ex2location2,
            'phone_numbers2' => $req->ex2phone_numbers2,
            'passwordnumber2' => $req->ex2passnumber2,
            'reg_number3' => $req->ex2reg_number3,
            'bankaccount2'=> $req->ex2bankaccount2,
            'status' => '1',// 1: төлбөр төлөх 2: баталгаажсан
            'price' => $req->ex2price1 * 0.5 / 100,
            'notary_id' => $req->notary_id,
            'user_id' => 'хоосон',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        );
        loan::insert([$insert]);
        return redirect('/contract');
    }
    public function delete_accreditation($id){
        accreditation::find($id)->delete();
        return redirect('/contract');
    } 
    public function delete_loan($id){
        loan::find($id)->delete();
        return redirect('/contract');
    }
    public function view_accreditation($id){
        $accreditation = accreditation::find($id)->first();
        return view('/contract/view/accreditation',['accreditation' => $accreditation]);
    } 
    public function view_loan($id){
        $loan = loan::find($id)->first();
        return view('/contract/view/loan',['loan' => $loan]);
    }
    public function status_accreditation($id){
        $accreditation = accreditation::find($id)->first();
        if($accreditation->status==1) $accreditation->status = '2';
        else $accreditation->status = '1';
        $accreditation->save();
        return back();
    }
    public function status_loan($id){
        $loan = loan::find($id)->first();
        if($loan->status==1) $loan->status = '2';
        else $loan->status = '1';
        $loan->save();
        return back();
    }
    public function accreditation_user(Request $req){
        $reg_number = $req->user_registration_number;
        $id = $req->id;
        $accreditation = accreditation::find($id);
        $accreditation->user_id = mb_strtoupper($reg_number);
        $accreditation->save();
        return back();
    }
    public function loan_user(Request $req){
        $reg_number = $req->user_registration_number;
        $id = $req->id;
        $loan = loan::find($id);
        $loan->user_id = mb_strtoupper($reg_number);
        $loan->save();
        return back();
    }
}
