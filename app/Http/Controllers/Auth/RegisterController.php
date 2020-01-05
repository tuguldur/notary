<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use App\Role;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'registration_number' => ['required', 'string', 'max:10','unique:users']
        ],[
            'email.required' => 'Цахим хаяг аа оруулна уу.',
            'email.email' => 'Цахим хаяг аа зөв оруулна уу.',
            'email.exists' => 'Цахим хаяг бүртгэлтэй байна.',
            'name.required' => 'Нэрээ оруулна уу.',
            'password.required' => 'Нууц үгээ оруулна уу.',
            'password.min' => 'Нууц үг доод тал нь 8 оронтой байна.',
            'password.confirmed' => 'Нууц үг таарахгүй байна.',
            'registration_number.max' => 'Регистрийн дугаар дээд тал нь 10 оронтой байна.',
            'registration_number.required' => 'Регистрийн дугаараа оруулна уу.',
       ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'registration_number' => mb_strtoupper($data['registration_number']),
            'password' => Hash::make($data['password']),
        ]);
        $user->roles()->attach(Role::where('name', 'user')->first());
        return $user;
    }
}
