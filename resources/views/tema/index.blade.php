@extends('layouts.app')

@section('content')
    <div class="container col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="row">
            <div><h3 class="text-center margen_boton">Inicia un nuevo Tema</h3></div>
            <form action="{{ url('tema/store') }}" method="post" id="formPublicar" class="col-xs-12 col-sm-9 col-md-9 col-lg-10 center-block" style="float: none">
                <label class="tema_titulo" for="">Titulo</label>
                <input type="text" name="titulo" class="titulo-pub" placeholder="Sé específico con el titulo de tú pregunta o tema">
                <div id="error_titulo_pub"></div>

                <div class="caja_select_cat">
                    <label class="donde_publicar" for="">Dónde lo quieres publicar? </label>
                    <select name="cat_id" class="select_pub">
                        <option value="">Seleccioná la categoria</option>
                        @foreach($cat as $c)
                            <option value="{{ $c->id }}">{{ $c->cat_nombre }}</option>
                        @endforeach
                    </select>
                </div>
                <div id="error_cat_pub"></div>

                <textarea name="mensaje" id="mensaje" class="tinymce"></textarea><br>
                <!-- sms de mensaje vacio -->
                <div id="mensaje_vacio_pub"></div>

                <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                {{ csrf_field() }}
                <input type="submit" id="btn-env" value="Publicar nuevo tema" class="btn-enviar-respuesta">
            </form>
        </div>
    </div>
@endsection
@push('script')
<script src="/js/tema.js"></script>
<script>
    CKEDITOR.replace('mensaje', {
        lang: 'es',
        //skin: 'office2013',
        allowedContent: true,
        ignoreEmptyParagraph: false,
        enterMode: CKEDITOR.ENTER_BR
    });
</script>
@endpush