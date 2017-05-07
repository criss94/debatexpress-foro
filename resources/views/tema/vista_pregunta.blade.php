@extends('layouts.app')
@section('title',$p->titulo)
@section('content')
    <div class="container col-xs-12 col-sm-12 col-md-12 col-lg-12" id="vista-pregunta">
        <div class="row" style="font-family:'Helvetica Neue', Helvetica, Arial, sans-serif ">

            <div class="contenido-submenu">
                <div class="submenu" style="padding-bottom: 3px">
                    <a href="{{ url('/') }}" class="sub-home"><i class="fa fa-home" aria-hidden="true"></i></a>
                    <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                    <a href="{{ url('/foros') }}" class="sub-home">Foros</a>
                    <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                    <strong>&nbsp;{{ $p->cat_nombre }}</strong>
                </div>
                @if(auth()->check())
                    <div class="aside-contenido-r">
                        <a href="{{ url('/tema') }}" style="margin-top: 3.2px" class="btn-register">Formular una pregunta</a>
                    </div>
                    @else
                    <div class="aside-contenido-r">
                        <a href="{{ url('/register') }}" style="margin-top: 3.2px" class="btn-register">Registrate ahora</a>
                    </div>
                @endif
            </div>

            <span class="fecha_autor">
                Tema en
                <a href="{{ url('foros') }}/{{ $p->cat_id }}/{{ $p->cat_slug }}" class="color_grey">"{{ $p->cat_nombre }}"</a> iniciado por
                <a href="{{ url('miembros') }}/{{ $p->user_id }}/{{ $p->name_slug }}" class="color_grey">{{ $p->user_name }}</a>, {{ $p->fecha }}
            </span>

            @if(auth()->check())
            <!-- aqui se inserta el html x ajax con el resultado de los like que tiene el tema -->
            <div id="like-tema"></div>
            <input type="text" id="id-del-tema-para-los-likes" value="{{ $p->id }}" style="display: none;">
            @else @endif

            <!-- el contador de vivistas -->
            <span class="cant-visitas">Visitas: <b style="color: #333" id="totalVisitas">{{ $p->visitas }}</b></span>          

            <h3 class="title_vista text-center">{{ $p->titulo }}</h3>
            <input id="slug" value="{{ $p->slug }}" style="display: none">

            <span class="linea_separadora"></span>

            <!-- pregunta -->
            <div class="caja-mensaje" id="c-sms-publicado">
                <p class="elmensaje">{!! $p->mensaje !!}</p>
            </div>

            <!-- seccion de las respuestas de lo usuarios -->
            <div class="respuestas_de_usuarios">
                <p class="title_respuesta" id="totalComentarios" style="margin-bottom: -35px;width: 150px"></p>
                <!-- este boton solo es para que el total de respuestas no se descuadre -->
                <!--<div class="" style="display:block;margin: 0px 0px 0px 0px;background: #fff"></div>-->
                @if(auth()->check())
                    <button id="add_comentario" class="btn btn-primary btn-sm"><i class="fa fa-plus" aria-hidden="true"></i> Añadir comentario</button>
                    <button id="hidden_comentario" class="btn btn-primary btn-sm"><i class="fa fa-minus" aria-hidden="true"></i> &nbsp;Ocultar Editor</button>
                @else
                    <a href="{{ url('login') }}" class="btn btn-primary btn-sm" id="btn-no-comenta"><i class="fa fa-plus" aria-hidden="true"></i> Añadir comentario</a>
                @endif
                
                <div id="deslizar-form" style="display: none;">
                    @if(auth()->check())
                        <span class="linea_separadora" style="margin-top:5px;margin-bottom: 10px"></span>
                        <!--<p class="title_respuesta">Tu Respuesta</p>-->
                       
                        <!-- form de respuesta de otro usuario -->
                        <form action="{{ url('respuesta') }}" method="post" class="ocultoEnMobile" id="formRespuesta">
                            <input type="hidden" name="name" value="{{ Auth::user()->name }}">
                            <textarea name="comentario" id="comentario" class="comentario"></textarea>
                            {{ csrf_field() }}<br>
                            <input type="hidden" name="slug" id="slug" value="{{ $p->slug }}">
                            <input type="hidden" name="user_id" id="user_id" value="{{ Auth::user()->id }}">
                            <input type="hidden" name="cat_id" value="{{ $p->cat_id }}">
                            <input type="hidden" name="tema_id" value="{{ $p->id }}">
                            <input type="hidden" name="genero" value="{{ Auth::user()->genero }}">
                            <div id="mensaje_vacio"></div>
                            <!--<input type="submit" class="btn-enviar-respuesta" value="Publicar Respuesta">-->
                            <input type="submit" class="btn btn-primary btn-sm" value="Publicar Respuesta">
                            <input style="display: none;width: 110px" value="Ocultar Editor" id="hidden_comentario2" class="btn btn-primary btn-sm"> 
                        </form>

                        <!--<div id="mensaje_vacio"></div>-->
                        
                    @endif
                </div>

                <span class="linea_separadora" style="margin-top:5px;margin-bottom: 5px"></span>
                <div id="respuesta_users"></div>
            </div>

            
            @if(!auth()->check())
                <div class="content-aviso">
                    <a href="{{ url('/login') }}" class="btn-no-logueado">Iniciar sesión</a>
                    <p class="text-aviso">Debes iniciar sesión para responder esta pregunta</p>
                </div>
            @endif

            <!--<span class="linea_separadora"></span>-->

            <!-- Large modal para editar el comnetario-->
            <div class="modal fade modal-comentario" id="modal-comentario" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
              <div class="modal-dialog modal-md" role="document">
                <div class="modal-content" style="padding: 15px 30px">
                    <h4 class="text-center" style="color: #000">Modificar Comentario</h4><br>
                    
                    <form action="{{ url('editarMiComentario') }}" method="post" id="formEditComentario">
                        <textarea name="comentario" id="editarComentario" class="editarcomentario"></textarea>
                        <input type="hidden" name="id" id="id_comentario">
                        {{ csrf_field() }} <br>
                        <input type="hidden" name="_method" value="PUT">
                        <input type="submit" class="btn btn-primary btn-sm" value="Editar mí comentario">
                        <button type="button" class="btn btn-info btn-sm" data-dismiss="modal">Cancelar</button>
                    </form>

                </div>
              </div>
            </div>
    
        </div>
    </div>
@endsection
@push('script')
<script>

    $(document).ready(function(){
        // sube el contador cuando carge todo el documento
        contadorDeVisitasAlTema();
        // sube el contador cuando le den like al tema
        contadorDeLikesEnElTema();

    });

    var rutaLikesTema = '{{ url('likesTema') }}';
    function contadorDeLikesEnElTema(){
        var slug = $('#slug').val();

        $.ajax({
            url:rutaLikesTema+'/'+slug,
            type:'get',
            success:function(likesTema){
                //alert(likesTema);
                $('#like-tema').html(likesTema);
            }
        });

    }

    var likeTema = '{{ url('likeTema') }}';
    $('body').on('click','#like-tema #me-gusta-el-tema',function(){
        var slug = $('#slug').val();
        var id_tema = $('#id-del-tema-para-los-likes').val();
        
        $.ajax({
            url:likeTema+'/'+slug+'/'+id_tema,
            type:'get',
            success:function(data){
                $('#like-tema').html(data);
            }
        });

    });


    var rutavisitas = '{{ url('visitas') }}';
    function contadorDeVisitasAlTema(){
        var slug = $('#slug').val();
        
        $.ajax({
            url:rutavisitas+'/'+slug,
            type:'get',
            success:function(visitas){
                $(visitas).each(function(i, item){
                    $('#totalVisitas').html(item.visitas);
                });
            }
        });

    }

    //integro al editor ckeditor lo que toma como parametro no es el ID, sino el 'name' del textarea
    /*CKEDITOR.replace('comment', {
        lang: 'es',
        //skin: 'office2013',
        allowedContent: true,
        ignoreEmptyParagraph: false,
        enterMode: CKEDITOR.ENTER_BR
    });*/

    var totalComentarios = "{{ url('/totalComentarios') }}";
    var listarRespuestas = "{{ url('/traerRespuestas') }}";
    var listarComentarioPorId = "{{ url('/listarComentarioPorId') }}";
    var eliminarComentarioPorId = "{{ url('/eliminarComentarioPorId') }}";

    //ruta para los likes en los comentarios
    var like = "{{ url('like') }}";
    var dislike = "{{ url('dislike') }}";

    /*function listarRespuestas() {
        var listarRespuestas = '{{ url('/traerRespuestas') }}';
        var slug = $('#slug').val();
        $.ajax({
            url:listarRespuestas+'/'+slug,
            type:'get',
            success:function (respuestas) {
                $('#respuestas-users').html(respuestas);
            }
        });
    }*/
</script>
<script src="/js/comentario.js"></script>
<script src="/js/bootbox.min.js"></script>
<script>
    //boton que desliza el form para agregar un comentario
    $('#hidden_comentario2').hide();
    $('#add_comentario').click(function(){
        $(this).hide();
        $('#hidden_comentario').show();
        $('#hidden_comentario2').show();
        $('#deslizar-form').slideToggle();
    });
    //oculto el editor
    $('#hidden_comentario').click(function(){
        $(this).hide();
        $('#add_comentario').show();
        $('#hidden_comentario2').show();
        $('#deslizar-form').slideToggle();
    });


    $('#hidden_comentario2').click(function(){
        $(this).hide();
        $('#hidden_comentario').hide();
        $('#add_comentario').show();
        $('#deslizar-form').slideToggle();
    });

    /* traer el dato del comentario */
    $('body').on('click','.campo_editar .editar_comentario', function(e){
        e.preventDefault();
        var id = $(this).data('id');
        
        $.ajax({
            url:listarComentarioPorId+'/'+id,
            type:'get',
            success:function(comentario){
                $(comentario).each(function(i,item){
                    $('#id_comentario').val(item.id);
                    tinymce.get("editarComentario").setContent(item.comentario);
                });
            }
        });

        /* editar el comentario */
        $('#formEditComentario').submit(function(event){
            event.preventDefault();
            var ruta = $(this).attr('action');
            var id_coment = $('#id_comentario').val();
            var formData = $(this).serialize();

            $.ajax({
                url:ruta+'/'+id_coment,
                type:'post',
                data:formData,
                success:function(data){
                    $('#modal-comentario').modal('hide');
                }
            });

        });

    });

    /* eliminar el comentario x el usuario mismo */
    $('body').on('click','.campo_editar .eliminar_comentario',function(e){
        e.preventDefault();
        var id = $(this).data('id');
        var slug = $('#slug').val();
        var baseurl = '{{ url('pregunta') }}';

        bootbox.confirm({
            size: "small",
            //title: "<h5 style='color:darkred'>Esta opcion no se puede deshacer</h5>",
            message: "Esta seguro que quiere eliminar su comentario?",
            buttons: {
                cancel: {
                    label: '<i class="fa fa-times"></i> Cancelar'
                },
                confirm: {
                    label: '<i class="fa fa-check"></i> Eliminar'
                }
            },
            callback: function (result) {
                if (result == false) {
                    //no hace nada
                }else{
                    //se envia el id y elimina el comentario
                    $.ajax({
                        url:eliminarComentarioPorId+'/'+id,
                        type:'get',
                        success:function(comentario){
                            
                        }
                    });
                    return true;
                }
            }
        });
            
    });

    $('body').on('click','.text_votos #me-gusta',function(e){
        e.preventDefault();
        
        var id_coment = $(this).data('id');
        var slug = $('#slug').val();

        $.ajax({
            url:like+'/'+slug+'/'+id_coment,
            type:'get',
            success:function(response){
                //alert(response);
            }
        });

    });

</script>
@endpush