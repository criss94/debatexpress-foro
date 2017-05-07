@extends('layouts.app')

<!-- Main Content -->
@section('content')
<div class="container col-xs-12 col-sm-12 col-md-12 col-lg-12">
    <div class="row">

                <div class="title-register">Restablecer Password</div>

                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form role="form" method="POST" action="{{ url('/password/email') }}">
                        {{ csrf_field() }}

                        <div class="col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3 col-lg-6 col-lg-offset-3">
                            <input id="email" type="email" class="inputs-form ultimo-input" name="email" value="{{ old('email') }}" placeholder="Ingresá tu email" required>

                            @if ($errors->has('email'))
                                <span class="letter-small">
                                    <span>{{ $errors->first('email') }}</span>
                                </span>
                            @endif
                        </div>
                            
                            <div class="center-block">
                                <button type="submit" class="btn-form-register">
                                    Restablecer
                                </button>
                            </div>

                    </form>

    </div>
</div>
@endsection
