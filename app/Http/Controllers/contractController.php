<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
class contractController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        return view('notary/contract');
    }
    public function accreditation(){
        return view('create/accreditation');
    }
    public function loan(){
        return view('create/loan');
    }
    public function save_acceditation(){
        $ex1loc = $req->ex1loc;
        $ex1prov = $req->ex1prov;
        $ex1city = $req->ex1city;
        $ex1street = $req->ex1street;
        $ex1numb = $req->ex1numb;
        $ex1no = $req->ex1no;
        $ex1userlastname = $req->ex1userlastname;
        $ex1userfirstname = $req->ex1userfirstname;
        $ex1userreg_number = $req->ex1userreg_number;
        $ex1text = $req->ex1text;
        $ex1city1 = $req->ex1city1;
        $ex1stage = $req->ex1stage;
        $exloc1 = $req->exloc1;
        $ex1street1 = $req->ex1street1;
        $ex1bnumber = $req->ex1bnumber;
        $ex1no1 = $req->ex1no1;
        $ex1representativelastname = $req->ex1representativelastname;
        $ex1representativefirstname = $req->ex1representativefirstname;
        $ex1timedate = $req->ex1timedate;
        $ex1Representativename = $req->ex1Representativename;
        $ex1passwordnumber = $req->ex1passwordnumber;
        $ex1registernumber = $req->ex1registernumber;
        $ex1trusteename = $req->ex1trusteename;
        $ex1trusteepasswordnumber = $req->ex1trusteepasswordnumber;
        $ex1trusteeregisternumber = $req->ex1trusteeregisternumber;
        $user_username = $req->username;
    }
}
