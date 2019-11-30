<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\loan;
use App\accreditation;
use Carbon\Carbon;
use Auth;
class contractController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        $notary_id = Auth::user()->id;
        $loan = loan::where('notary_id', $notary_id)->get();
        $accreditation = accreditation::where('notary_id', $notary_id)->get();
        return view('notary/contract',['accreditations'=>$accreditation,'loans'=>$loan]);
    }
    public function accreditation(){
        return view('create/accreditation');
    }
    public function loan(){
        return view('create/loan');
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
            'user_id' => 'not_set',
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
            'user_id' => 'not_set',
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
}
