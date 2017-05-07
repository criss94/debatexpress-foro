@extends('layouts.app')
@section('title','Panel de Administración')
@section('content')
    <div class="container col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="row">

            <div class="text-center"><h3>Panel de Administración</h3></div>

            <a href="{{ url('/usuarios') }}" class="style-link">
                <div class="img-cont col-sm-6 col-md-6 col-lg-5">
                    <i class="fa fa-users stylo-ico" aria-hidden="true"></i>
                    <span class="desc-foro">Administrar Usuarios</span>
                </div>
            </a>

            <a href="{{ url('/categorias') }}" class="style-link">
                <div class="img-cont col-sm-6 col-md-6 col-lg-5">
                    <i class="fa fa-edit stylo-ico" aria-hidden="true"></i>
                    <span class="desc-foro">Administrar Categorias</span>
                </div>
            </a>

            <a href="{{ url('/comentarios') }}" class="style-link">
                <div class="img-cont col-sm-6 col-md-6 col-lg-5">
                    <i class="fa fa-commenting stylo-ico" aria-hidden="true"></i>
                    <span class="desc-foro">Administrar Comentarios</span>
                </div>
            </a>

            <a href="{{ url('/admin') }}" class="style-link">
                <div class="img-cont col-sm-6 col-md-6 col-lg-5">
                    <i class="fa fa-cogs stylo-ico" aria-hidden="true"></i>
                    <span class="desc-foro">Administrar Cuenta</span>
                </div>
            </a>
        </div>
    </div>
@endsection