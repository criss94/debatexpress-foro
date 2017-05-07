@extends('layouts.app')
@section('title','Panel Categorias')
@section('content')
    <div class="container col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="row">
            <div class="text-center"><h3 class="reducir">Administrar las Categorias</h3></div>
            @include('messages.messages')
            <div class="center-block content-cat">
                <span class="title-cat">Categorias</span>
                <a class="create-cat" href="{{ route('categorias.create') }}" title="Agregar nueva categoria">
                    <i class="fa fa-plus" aria-hidden="true"></i>
                </a>
                <ol>
                    @foreach($categorias as $c)
                    <li class="name-cat">{{ $c->cat_nombre }}</li>

                    <a class="drop-cat" href="{{ route('categorias.show',$c->id) }}" title="Eliminar Categoria">
                        <i class="fa fa-trash" aria-hidden="true"></i>
                    </a>
                    <a class="edit-cat" href="{{ route('categorias.edit',$c->id) }}" title="Editar Categoria">
                        <i class="fa fa-pencil" aria-hidden="true"></i>
                    </a>
                    @endforeach
                </ol>

            </div>

        </div>
    </div>
@endsection