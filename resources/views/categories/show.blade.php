@extends('layouts.app')
@section('title','Detalle de la Categoria')
@section('content')
    <div class="container col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="row">
            <div class="text-center"><h3>Detalle de la Categoria</h3></div>
            @include('messages.messages')
            <form action="{{ route('categorias.destroy',$c->id) }}" method="post" onsubmit="return dropCat()">
                <div class="col-xs-12 col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4 col-lg-6 col-lg-offset-3 padding" >
                    <p class="text-center detalle-cat">{{ $c->cat_nombre }}</p>
                    <p class="text-center detalle-cat">{{ $c->cat_descripcion}}</p>

                    {{ csrf_field() }}
                    <input type="hidden" name="_method" value="DELETE">
                    <input type="submit" value="Eliminar" class="btn-form-admin">

                    <!--<a href="" class="btn-form-Admin">Seguir agregando</a>-->
                    <a href="{{ url('categorias') }}" class="btn-form-admin">Salir</a>
                </div>
            </form>
        </div>
    </div>
@endsection
@push('script')
<script>
    function dropCat() {
        var name_cat='{{ $c->cat_nombre }}';
        if (confirm('Esta seguro que quiere eliminar la categoria '+name_cat+'?')){
            window.location='{{ url('/categorias') }}';
            return true;
        }
        window.location='{{ url('/categorias') }}';
        return false;
    }
</script>
@endpush