@extends('layouts.app')
@section('title','Nueva Categoria')
@section('content')
    <div class="container col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="row">
            <div class="text-center"><h3>Editar Categoria</h3></div>
            <form action="{{ route('categorias.update',$c->id) }}" method="post">
                <div class="col-xs-12 col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4 col-lg-6 col-lg-offset-3 padding" >
                    <input type="text" name="cat_nombre" value="{{ $c->cat_nombre }}" class="inputs-form text-center" placeholder="Nombre de tu Categoria">
                    @if($errors->has('cat_nombre'))
                        <div class="letter-small text-center">{{ $errors->first('cat_nombre') }}</div>
                    @endif
                    <textarea name="cat_descripcion" class="inputs-form text-center" placeholder="Un breve resumen de lo que puede publicar">{{ $c->cat_descripcion }}</textarea>
                    @if($errors->has('cat_descripcion'))
                        <div class="letter-small text-center">{{ $errors->first('cat_descripcion') }}</div>
                    @endif
                    {{ csrf_field() }}<br><br>
                    <input type="hidden" name="_method" value="PUT">
                    <input type="submit" value="Actualizar Categoria" class="btn-form-admin">
                    <a href="{{ url('/categorias') }}" class="btn-form-admin">Volver</a>
                </div>
            </form>
        </div>
    </div>
@endsection