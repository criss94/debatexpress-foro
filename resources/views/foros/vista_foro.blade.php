@extends('layouts.app')

@section('content')
    <div class="container col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="row">
            <!--<div class="">-->
            <div class="contenido-submenu">
                <div class="submenu">
                    <a href="{{ url('/') }}" class="sub-home"><i class="fa fa-home" aria-hidden="true"></i></a><i class="fa fa-angle-double-right" aria-hidden="true"></i>
                    <a href="{{ url('/foros') }}" class="sub-home">Foros</a><i class="fa fa-angle-double-right" aria-hidden="true"></i>
                    <b> &nbsp;{{ $t->cat_nombre }}</b>
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

            <div id="contenido_foros">
                <h3 class="title_foro">{{ $t->cat_nombre }}</h3>
                <p class="desc_foro">{{ $t->cat_descripcion }}</p>

                @if($foros->total() >= 21)
                <div id="paginador_foros">
                    <span class="contador_paginate">Página <b>{{ $foros->currentPage() }}</b> de <b>{{ $foros->lastPage() }}</b></span>
                    <div class="paginador">{{ $foros->links() }}</div>
                </div>
                @else
                    
                @endif

                @if($foros->firstItem() == '' )
                    <div class="listado_foros">
                    <div class="subtitle_foro">
                        <p class="header_title">Titulo</p>
                        <p class="header_resp_vis">Respuestas</p>
                        <p class="header_resp_vis">Visitas</p>
                        
                        <div style="padding: 10px 5px 20px 5px;text-align: center;background: lightgrey;color: #333;line-height: 12px">
                            La página <b>Nº {{ $foros->currentPage() }}</b> no existe o no contiene registros
                        </div>                        

                        <div id="info-paginate" style="background: #333;color: #fff;font-size: 12px;padding: 16px 10px;margin-top: -10px"></div>

                    </div>

                </div>
                @else
                <div class="listado_foros">
                    <div class="subtitle_foro">
                        <p class="header_title">Titulo</p>
                        <p class="header_resp_vis">Respuestas</p>
                        <p class="header_resp_vis">Visitas</p>
                        <!--<p class="header_ult_men">Último mensaje</p>-->
                        @foreach($foros as $f)
                        <div class="preguntas_foro">
                            <div class="">
                                @if($f->genero == 'M')
                                <figure>
                                    <a href="{{ url('miembros') }}/{{ $f->user_id }}/{{ $f->name_slug }}"><img class="img-user" src="/img/man.png" alt=""></a>
                                </figure>
                                @elseif($f->genero == 'F')
                                <figure>
                                    <a href="{{ url('miembros') }}/{{ $f->user_id }}/{{ $f->name_slug }}"><img class="img-user" src="/img/woman.png" alt=""></a>
                                </figure>
                                @elseif($f->genero == 'facebook')
                                <figure>
                                    <a href="{{ url('miembros') }}/{{ $f->user_id }}/{{ $f->name_slug }}"><img class="img-user" src="/img/facebook.png" alt=""></a>
                                </figure>
                                @elseif($f->genero == 'twitter')
                                <figure>
                                    <a href="{{ url('miembros') }}/{{ $f->user_id }}/{{ $f->name_slug }}"><img class="img-user" src="/img/twitter.png" alt=""></a>
                                </figure>
                                @elseif($f->genero == 'google')
                                <figure>
                                    <a href="{{ url('miembros') }}/{{ $f->user_id }}/{{ $f->name_slug }}"><img class="img-user" src="/img/google.png" alt=""></a>
                                </figure>
                                @endif
                                <h1 class="title_pregunta"><a title="{{ $f->titulo,50 }}" href="{{ url('pregunta') }}/{{ $f->slug }}" data-toggle="tooltip" data-placement="top">{{ str_limit($f->titulo,50) }}</a></h1>
                                <p class="user_fecha"><a href="{{ url('miembros') }}/{{ $f->user_id }}/{{ $f->name_slug }}" title="{{ $f->name }}" data-toggle="tooltip" data-placement="top">{{ $f->name }}</a>, {{ $f->fecha }}</p>
                                <div id="caja-visible-mobile">
                                    Respuestas: <b>{{ $f->total_respuestas }}</b> Visitas: <b>{{ $f->visitas }}</b>
                                </div>
                            </div>
                        </div>

                        <div class="respuestas">
                            <span title="Total de respuestas en el Tema" class="resp-numeros"><i class="fa fa-comments" aria-hidden="true"></i> {{ $f->total_respuestas }}</span>
                        </div>
                        <div class="visitas">
                            <span title="Cantidad de Visitas" class="visi-numeros"><i class="fa fa-eye" aria-hidden="true"></i> {{ $f->visitas }}</span>
                        </div>

                        <span class="linea_foros"></span>
                        @endforeach

                        <div id="info-paginate" style="background: #333;color: #fff;font-size: 12px;padding: 6px 10px;margin-top: -10px">
                            Viendo <b>{{ $foros->firstItem() }}</b> al <b>{{ $foros->lastItem() }}</b> de <b>{{ $foros->total() }}</b> temas
                        </div>

                    </div>

                </div>
                @endif

                @if($foros->total() >= 21)
                
                <div id="paginador_foros">
                    <span class="contador_paginate">Página <b>{{ $foros->currentPage() }}</b> de <b>{{ $foros->lastPage() }}</b></span>
                    <div class="paginador">{{ $foros->links() }}</div>
                </div>
                @else

                @endif

            </div>

            <!--</div>-->
        </div>
    </div>
@endsection
