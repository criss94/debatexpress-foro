@extends('layouts.app')

@section('content')
<div class="container col-xs-12 col-sm-12 col-md-12 col-lg-12">
    <div class="row">

        <div class="title-register">Inicia sesión</div>

        <form class="" role="form" method="POST" action="{{ url('/login') }}">
            {{ csrf_field() }}
            <meta name="csrf-token" content="{{ csrf_token() }}">

            <div class="col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3 col-lg-6 col-lg-offset-3">
                <input id="email" type="email" class="inputs-form" name="email" value="{{ old('email') }}" autofocus placeholder="Ingresá tu e-mail" required>

                @if ($errors->has('email'))
                    <span class="letter-small">
                        <span>{{ $errors->first('email') }}</span>
                    </span>
                @endif
            </div>

            <div class="col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3 col-lg-6 col-lg-offset-3">
                <input id="password" type="password" class="inputs-form" name="password" placeholder="Ingresá tu password" required>

                @if ($errors->has('password'))
                    <span class="letter-small">
                        <span>{{ $errors->first('password') }}</span>
                    </span>
                @endif
            </div>

            <div class="col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3 col-lg-6 col-lg-offset-3">
                <label class="quitar-pading">
                    <input type="checkbox" name="remember"> <span style="display:block;margin: -27px 0px 0px 23px">Recordarme</span>
                </label>
            </div>
            
            <div class="center-block btn-login" style="clear: both;">
                <button type="submit" class="btn-form-register">
                   Ingresar
                </button>
            </div>
            <div class="center-block" style="margin-top: -27px">
                <a class="centrar" href="{{ url('/password/reset') }}">
                    Olvidaste tu Contraseña?
                </a>
            </div>

            <span class="o_tambien">ó tambien puedes</span>

            <div class="auth_redes">
                <a href="{{ url('auth/facebook') }}" class="btn_facebook_auth">
                    <i class="fa fa-facebook-square" aria-hidden="true"></i> Ingresar con Facebook
                </a>
            </div>

            <div class="auth_redes">
                <a href="{{ url('auth/twitter') }}" class="btn_facebook_auth">
                    <i class="fa fa-twitter-square" aria-hidden="true"></i> Ingresar con Twitter
                </a>
            </div>

            <div class="auth_redes">
                <a href="{{ url('auth/google') }}" class="btn_facebook_auth">
                    <i class="fa fa-google-plus-square" aria-hidden="true"></i> Ingresar con Google+
                </a>
            </div>

        </form>

    </div>
</div>
@endsection
