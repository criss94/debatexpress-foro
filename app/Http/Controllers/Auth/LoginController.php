<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use App\User;
use Socialite;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
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
        $this->middleware('guest', ['except' => 'logout']);
    }

    ///////////////////////////////////////////////////
    // otra forma mas corta de login con redes sociales
    ///////////////////////////////////////////////////

    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function handleProviderCallback($provider)
    {
        try{
            $socialUser = Socialite::driver($provider)->user();
        }catch (Exception $e){
            return redirect('auth/'.$provider);
        }
        
        $authUser = $this->findOrCreateUser($socialUser, $provider);
        Auth::login($authUser, true);
        //cambio el campo activo por 1 para mostrar al user activo o en linea
        if (auth()->user()->activo == 0) {
            $id_user = auth()->user()->id;
            $u = User::FindOrFail($id_user);
            $u->activo = 1;
            $u->save();
        }
        return redirect('/login');
    }

    public function findOrCreateUser($socialUser, $provider)
    {
        $authUser = User::where('provider_id', $socialUser->id)->first();
        if ($authUser) {
            return $authUser;
        }
        return User::create([
            'name'=>ucwords($socialUser->getName()),
            'name_slug'=>str_slug($socialUser->getName()),
            'email'=>$socialUser->getEmail(),
            'avatar'=>$socialUser->getAvatar(),
            'provider_id'=>$socialUser->getId(),
            'password'=>sha1(md5('sinpassword')),
            'role'=>'user',
            'genero'=>$provider,
            'activo'=>0
        ]);

    }
    /////////////////////////////////////////////////////////
    /////////////////////////////////////////////////////////
    /////////////////////////////////////////////////////////

    public function redirectPath()
    {
        //cambio el campo activo por 1 para mostrar al user activo o en linea
        if (auth()->user()->activo == 0) {
            $id_user = auth()->user()->id;
            $u = User::FindOrFail($id_user);
            $u->activo = 1;
            $u->save();
        }

        if (auth()->user()->role == 'user'){
            return '/';
        }
        return 'admin';
    }
}
