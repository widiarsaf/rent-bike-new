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
            'nama' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:100'],
            'password' => ['required', 'string', 'min:8'],
            'telepon'  => ['required', 'string', 'max:15'],
            'is_admin' => ['nullable']
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
        If(isset($_POST["is_admin"])){

            return User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'nama' => $data['nama'],
                'username' => $data['username'],
                'password' => Hash::make($data['password']),
                'telepon'  => $data['telepon'],
                'is_admin' => $data['is_admin'],
            ]);
        }
        else{
            return User::create([
                'nama' => $data['nama'],
                'username' => $data['username'],
                'password' => Hash::make($data['password']),
                'telepon'  => $data['telepon'],
                ]);
             }
        }
}
