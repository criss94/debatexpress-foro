@extends('layouts.app')

@section('title','Miembros')
@section('content')
	<div class="container col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="row">

            <div class="contenido-submenu">
                <div class="submenu">
                    <a href="{{ url('/') }}" class="sub-home"><i class="fa fa-home" aria-hidden="true"></i></a><i class="fa fa-angle-double-right" aria-hidden="true"></i>
                    <a href="{{ url('miembros') }}" class="sub-home">Miembros</a><i class="fa fa-angle-double-right" aria-hidden="true"></i>
                    <b>&nbsp; {{ $u->name }}</b>
                </div>
                <div class="search-general">
                    <form action="{{ url('search') }}" method="get" id="buscadorGeneral">
                        <div class="">
                            <input type="text" name="user" id="nameUser" class="input-search" placeholder="Búscar usuario">
                        </div>
                        <button type="submit" class="btn-submit">
                            <i class="fa fa-search" aria-hidden="true"></i>
                        </button>
                    </form>
                </div>
            </div>
    
            <div id="contenido-perfil">
                <div class="data-left-p">
                    <div class="caja-user-p">
                        @if($u->genero == 'M')
                        <img src="/img/man.png" alt="" class="img-responsive">
                        @elseif($u->genero == 'F')
                        <img src="/img/woman.png" alt="" class="img-responsive">
                        @elseif($u->genero == 'facebook')
                        <img src="/img/facebook.png" alt="" class="img-responsive">
                        @elseif($u->genero == 'twitter')
                        <img src="/img/twitter.png" alt="" class="img-responsive">
                        @elseif($u->genero == 'google')
                        <img src="/img/google.png" alt="" class="img-responsive">
                        @endif
                    </div>
                    <div class="mini-data-p">
                        <div>
                            <span class="info-p">Última actividad: </span>
                            <span class="data-info-p">{{ substr($u->updated_at,0,16) }}</span>
                        </div>
                        <div>
                            <span class="info-p">Registrado: </span>
                            <span class="data-info-p">{{ substr($u->created_at,0,16) }}</span>
                        </div>
                        <div>
                            <span class="info-p">Temas publicados: </span>
                            <span class="data-info-p">{{ $total_temas }}</span>
                        </div>
                        <div>
                            <span class="info-p">Total comentarios: </span>
                            <span class="data-info-p">{{ $total_comentarios }}</span>
                        </div>
                        <div>
                            <span class="info-p">Me gusta recibidos: </span>
                            @foreach($total_likes as $t_l)
                                @if($t_l->likes == '')
                                <span class="data-info-p">0</span>
                                @else
                                <span class="data-info-p">{{ $t_l->likes }}</span>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="data-right-p">
                    <h1 class="name-p">{{ $u->name }}
                    @if($u->activo == 1)
                        <span class="usuario_activo_p">(&nbsp;En linea <span class="usuario_activo_ico" title="En linea"></span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;)</span>
                        <div class="relleno_perfil"></div>
                    @endif
                    </h1>
                    @if($u->activo == 1)

                    @else
                    <p class="ultima-vez">{{ $u->name }} fue visto por última vez: <b>{{ $u->updated_at }}</b></p>
                    @endif

                    <span class="linea_separadora"></span>
                    <div class="publicaciones-p">
                        <p class="ult-temas-p">Últimos temas publicados</p>

                        <span class="linea_separadora"></span>
                        @if(count($temas) != '')
                            @foreach($temas as $t)
                            <div class="temas-p">
                                <div class="img-p">
                                    @if($u->genero == 'M')
                                    <a href="{{ url('miembros') }}/{{ $t->user_id }}/{{ $t->name_slug }}">
                                        <img class="img-responsive" src="/img/man.png" alt="">
                                    </a>
                                    @elseif($u->genero == 'F')
                                    <a href="{{ url('miembros') }}/{{ $t->user_id }}/{{ $t->name_slug }}">
                                        <img class="img-responsive" src="/img/woman.png" alt="">
                                    </a>
                                    @elseif($u->genero == 'facebook')
                                    <a href="{{ url('miembros') }}/{{ $t->user_id }}/{{ $t->name_slug }}">
                                        <img class="img-responsive" src="/img/facebook.png" alt="">
                                    </a>
                                    @elseif($u->genero == 'twitter')
                                    <a href="{{ url('miembros') }}/{{ $t->user_id }}/{{ $t->name_slug }}">
                                        <img class="img-responsive" src="/img/twitter.png" alt="">
                                    </a>
                                    @elseif($u->genero == 'google')
                                    <a href="{{ url('miembros') }}/{{ $t->user_id }}/{{ $t->name_slug }}">
                                        <img class="img-responsive" src="/img/google.png" alt="">
                                    </a>
                                    @endif
                                </div>
                                <div class="data-t">
                                    <p class="title-p"><a title="{{ $t->titulo }}" href="{{ url('pregunta') }}/{{ $t->tema_slug }}" data-toggle="tooltip" data-placement="top">{{ str_limit($t->titulo,50) }}</a></p>
                                    <span class="pub-t">Publicado por: <b><a href="{{ url('miembros') }}/{{ $t->user_id }}/{{ $t->name_slug }}">{{ $t->name }}</a>,</b> el {{ $t->fecha }} en el foro: <b><a href="{{ url('foros') }}/{{ $t->cat_id }}/{{ $t->cat_slug }}"> {{ $t->cat_nombre }}</a></b></span>
                                </div>
                            </div>
                            <span class="linea_separadora"></span>
                            @endforeach
                        @else
                            <div style="font-weight: bold;padding-top: 20px;font-size: 1.2rem">
                                El usuario no dispone de información o su actividad es casi nula
                            </div>
                        @endif
                    </div>

                </div>
            </div>

        </div>
    </div>
@endsection