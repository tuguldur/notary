<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use Hash;
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
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'old_password' => ['required', 'string', 'min:8'],
            'email' => 'unique:users,email,'.Auth::user()->id.',id',
            'registration_number' => ['required', 'string', 'max:10','unique:users,registration_number,'.Auth::user()->id.',id'],
            'phone' => ['required', 'numeric'],
            'address' => 'required',
        ],[
            // цахим хаяг алдаа
            'email.required' => 'Цахим хаяг аа оруулна уу.',
            'email.email' => 'Цахим хаяг аа зөв оруулна уу.',
            'email.unique' => 'Цахим хаяг бүртгэлтэй байна.',
            // нэр алдаа
            'name.required' => 'Нэрээ оруулна уу.',
            // шинэ нууц үг алдаа
            'new_password.min' => 'Нууц үг доод тал нь 8 оронтой байна.',
            // хуучин нууц үг алдаа
            'old_password.required' => 'Нууц үгээ оруулна уу.',
            'old_password.min' => 'Нууц үг доод тал нь 8 оронтой байна.',
            // Регистрийн дугаар алдаа
            'registration_number.max' => 'Регистрийн дугаар дээд тал нь 10 оронтой байна.',
            'registration_number.required' => 'Регистрийн дугаараа оруулна уу.',
            'registration_number.unique' => 'Регистрийн дугаар бүртгэлтэй байна.',
            // хаяг алдаа
            'address.required' => 'Хаягаа оруулна уу.',
            // утасны дугаар алдаа
            'phone.required' => 'Утасны дугаараа оруулна уу.',
            'phone.numeric' => 'Утасны дугаар зөвхөн тооноос бүрдсэн байна.',
       ]);
        $old_password = Auth::user()->password;
        $check_password = $request->old_password;
        $new_password = $request->new_password;
        if (Hash::check($check_password, $old_password))
        {
            $user = User::find(Auth::user()->id);
            $user->name = $request->name;
            $user->email = $request->email;
            $user->registration_number = mb_strtoupper($request->registration_number);
            $user->phone = $request->phone;
            $user->address = $request->address;
            $new_password && $user->password = bcrypt($request->new_password);
            $user->save();
            return back();
        }
        else{
            return back()->withError('Нууц үг таарахгүй байна.');
        }
    }
}
