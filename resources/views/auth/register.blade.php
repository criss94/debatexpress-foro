@extends('layouts.app')

@section('content')
<div class="container col-xs-12 col-sm-12 col-md-12 col-lg-12">
    <div class="row">

        <div class="title-register">Registrate y publicá</div>

        <form role="form" method="POST" action="{{ url('/register') }}">
            {{ csrf_field() }}

            <div class="col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3 col-lg-6 col-lg-offset-3">
                <input id="name" type="text" class="inputs-form" name="name" value="{{ old('name') }}" autofocus placeholder="Ingresá tu Nombre ó Nick de Usuario" required>

                @if ($errors->has('name'))
                    <span class="letter-small">
                        <span>{{ $errors->first('name') }}</span>
                    </span>
                @endif
            </div>

            <div class="col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3 col-lg-6 col-lg-offset-3">
                <input id="email" type="email" class="inputs-form" name="email" value="{{ old('email') }}" placeholder="Ingresá tu E-mail" required>

                @if ($errors->has('email'))
                    <span class="letter-small">
                        <span>{{ $errors->first('email') }}</span>
                    </span>
                @endif
            </div>

            <div class="col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3 col-lg-6 col-lg-offset-3">
                <input id="password" type="password" class="inputs-form" name="password" placeholder="Ingresá tu Password" required>

                @if ($errors->has('password'))
                    <span class="letter-small">
                        <span>{{ $errors->first('password') }}</span>
                    </span>
                @endif
            </div>

            <div class="col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3 col-lg-6 col-lg-offset-3">
                <input id="password-confirm" type="password" class="inputs-form ultimo-input" name="password_confirmation" placeholder="Confirmá tu Password" required>
            </div>

            <div class="col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3 col-lg-6 col-lg-offset-3">
                <label class="input_masculino" for="m">
                    <input id="m" type="radio" name="genero" value="M" checked> Masculino
                </label>
                <label class="input_femenino" for="f">
                    <input id="f" type="radio" name="genero" value="F"> Femenino
                </label>
            </div>
            <div class="col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3 col-lg-6 col-lg-offset-3">
                <div id="recaptcha">
                    <div class="g-recaptcha" data-sitekey="6LfKGxIUAAAAADVm5XkpBm56i2GXEiTVAW5nySmK"></div>
                    @if ($errors->has('g-recaptcha-response'))
                        <span class="letter-small">
                            <span>{{ $errors->first('g-recaptcha-response') }}</span>
                        </span>
                    @endif
                </div>
            </div>

            <div class="center-block" style="clear: both;">
                <button type="submit" class="btn-form-register">
                    Registrarme
                </button>
            </div>

        </form>

    </div>
</div>
@endsection
@push('script')
    <script src='https://www.google.com/recaptcha/api.js'></script>
@endpush
