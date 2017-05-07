<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Symfony\Component\HttpKernel\Client;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;

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
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

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
        $reglas = array(
            'name' => 'required|max:16|unique:users',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
            'g-recaptcha-response' => 'required'
        );
        $mensajes = array(
            'name.required' => 'El campo nombre es obligatorio',
            'name.unique' => 'El nombre ingresado ya se encuentra en uso',
            'name.max' => 'El campo nombre debe contener 20 caracteres como máximo',
            'g-recaptcha-response.required' => 'El reCAPTCHA es obligatorio'
        );
        return Validator::make($data, $reglas, $mensajes);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        $user = new User([
            'name' => ucwords($data['name']),
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'genero' => $data['genero']
        ]);
        $user->name_slug = str_slug($data['name']);
        $user->role = 'user';
        $user->activo = 1;
        $user->save();
        return $user;
    }

    public function redirectPath()
    {
        if (auth()->check() && auth()->user()->role == 'user') {
            return '/';
        }
        return 'admin';
    }
}
