@extends('layouts.app')

@section('content')
<div class="container col-xs-12 col-sm-12 col-md-12 col-lg-12">
    <div class="row">

        <div class="title-register">Restablecer Password</div>

        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        <form role="form" method="POST" action="{{ url('/password/reset') }}">
            {{ csrf_field() }}

            <input type="hidden" name="token" value="{{ $token }}">

            <div class="col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3 col-lg-6 col-lg-offset-3">
                <input id="email" type="email" class="inputs-form" name="email" value="{{ $email or old('email') }}" autofocus placeholder="Ingresá tu email">

                @if ($errors->has('email'))
                    <span class="letter-small">
                        <span>{{ $errors->first('email') }}</span>
                    </span>
                @endif
            </div>

            <div class="col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3 col-lg-6 col-lg-offset-3">
                <input id="password" type="password" class="inputs-form" name="password" placeholder="Ingresa tu password">

                @if ($errors->has('password'))
                    <span class="letter-small">
                        <span>{{ $errors->first('password') }}</span>
                    </span>
                @endif
            </div>

            <div class="col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3 col-lg-6 col-lg-offset-3">
                <input id="password-confirm" type="password" class="inputs-form ultimo-input" name="password_confirmation" placeholder="Confirmá tu password">

                @if ($errors->has('password_confirmation'))
                    <span class="letter-small">
                        <span>{{ $errors->first('password_confirmation') }}</span>
                    </span>
                @endif
            </div>


            <div class="center-block">
                <button type="submit" class="btn-form-register">
                    Resetear password
                </button>
            </div>

        </form>


    </div>
</div>
@endsection
