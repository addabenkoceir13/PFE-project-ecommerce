<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
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
    protected $redirectTo = RouteServiceProvider::HOME;

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
                'fname'     => ['required', 'string', 'max:255'],
                'lname'     => ['required', 'string', 'max:255'],
                'email'     => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password'  => ['required', 'string', 'min:8', 'confirmed'],
                'address1'  => ['required', 'string', 'max:255'],
                'address2'  => ['required', 'string', 'max:255'],
                'code'      => ['required',  'min:0'],
                'phone'     => ['required', ],
                'zip'       => ['required', 'min:0'],
                'city'      => ['required', 'string', 'max:255'],
                'state'     => ['required', 'string', 'max:255'],
                'country'   => ['required', 'string', 'max:255'],

        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name'      => ucwords($data['fname'] .' ' . $data['lname']),
            'fname'     => ucwords($data['fname']),
            'lname'     => ucwords($data['lname']),
            'email'     => $data['email'],
            'password'  => Hash::make($data['password']),
            'phone'     => $data['code'].''.$data['phone'],
            'address1'  => ucwords($data['address1']),
            'address2'  => ucwords($data['address2']),
            'city'      => ucwords($data['city']),
            'state'     => ucwords($data['state']),
            'country'   => ucwords($data['country']),
            'pincode'   => $data['zip'],
        ]);
    }
}
