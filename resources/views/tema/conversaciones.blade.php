@foreach($respuestas as $r)
    <div id="ultima-respuesta">{!! $r->comentario !!}

        <div class="origen_respuesta">
            <span class="fecha_hora_respondida">respondida el {{ $r->fecha }}</span>
            @if($r->genero == 'M')
                <a href="{{ url('miembros') }}/{{ $r->user_id }}/{{ $r->name_slug }}"><img src="/img/man.png" class="img_user_resp" width="40" height="44"></a>
            @elseif($r->genero == 'F')
                <a href="{{ url('miembros') }}/{{ $r->user_id }}/{{ $r->name_slug }}"><img src="/img/woman.png" class="img_user_resp" width="40" height="44"></a>
            @elseif($r->genero == 'facebook')
                <a href="{{ url('miembros') }}/{{ $r->user_id }}/{{ $r->name_slug }}"><img src="/img/facebook.png" class="img_user_resp" width="40" height="44"></a>
            @elseif($r->genero == 'twitter')
                <a href="{{ url('miembros') }}/{{ $r->user_id }}/{{ $r->name_slug }}"><img src="/img/twitter.png" class="img_user_resp" width="40" height="44"></a>
            @elseif($r->genero == 'google')
                <a href="{{ url('miembros') }}/{{ $r->user_id }}/{{ $r->name_slug }}"><img src="/img/google.png" class="img_user_resp" width="40" height="44"></a>
            @endif
            
            <span class="name_user_resp">
                <a href="{{ url('miembros') }}/{{ $r->user_id }}/{{ $r->name_slug }}">{{ $r->user_name }}</a>
            </span>
            @if(Auth::check())
                <span class="text_votos">
                    <!-- likes -->
                    <a data-id="{{ $r->id_coment }}" title="Me gusta este comentario" id="me-gusta" style="font-size: 20px;color: grey;cursor: pointer;"><i class="fa fa-thumbs-up" aria-hidden="true"></i></a><span style="margin-right: 10px"> {{ $r->like }}</span>
                </span>
                @if($r->user_id == Auth::user()->id)
                <div class="campo_editar">
                    <a class="texto_editar editar_comentario" style="cursor: pointer" data-toggle="modal" data-target=".modal-comentario" title="Editar respuesta" data-id="{{ $r->id_coment }}">Editar</a>
                    <a class="texto_editar eliminar_comentario" style="cursor: pointer" title="Eliminar respuesta" data-id="{{ $r->id_coment }}">Eliminar</a>
                </div>
                @else @endif
            @endif
        </div>
    </div>

    <span class="linea_separadora" style="margin-bottom: 5px"></span>
@endforeach