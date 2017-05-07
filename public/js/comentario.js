//con esto se cargan las funciones cuando el documento este listo
$(document).ready(function () {
    registrarMensajes();
    $.ajaxSetup({'cache':false});
    setInterval('loadMessages()',3000);
    setInterval('cantidadComentarios()',3000);
});

//guardo las respuestas
function registrarMensajes() {
    $('#formRespuesta').submit(function (e) {
        e.preventDefault();
        var ruta = $(this).attr('action');

        var resp = tinymce.get("comentario").getContent();
        //var editor = CKEDITOR.instances.comentario.getData();
        var formData = $(this).serialize();

        if (resp == ''){
            $('#mensaje_vacio').html('<span class="mensaje_vacio">' +
                'La respuesta no puede ser un campo vacio' +
                '<a href="#" id="delete_message_error" title="Cerrar este mensaje">X</a>'+
                '</span>').fadeIn(600);
                //vacia el contenido del editor
                //tinymce.activeEditor.setContent("");
                //CKEDITOR.instances.comentario.setData('');
            $('#delete_message_error').on('click',function (e) {
                e.preventDefault();
                $('.mensaje_vacio').fadeOut(600);
                return false;
            });
            return false;
        }else{
            $.ajax({
                url: ruta,
                type: 'post',
                data: formData,
                success: function (response) {
                    //vacia el contenido del editor
                    tinymce.activeEditor.setContent("");
                    //CKEDITOR.instances.comentario.setData('');
                    $('#mensaje_vacio').hide();
                    //CKEDITOR.instances.comment.setData("");
                    $('#comentario').val('');
                }
            });
        }

    });
}

$(function () {
    $('#delete_message_error').on('click',function (e) {
        e.preventDefault();
        $('.mensaje_vacio').fadeOut(600);
        return false;
    });
});

//traigo las respuestas insertadas segun el slug ingresado
var slug = $('#slug').val();
function loadMessages() {
    $.ajax({
        url:listarRespuestas+'/'+slug,
        type:'get',
        success:function (data) {
            $('#respuesta_users').html(data);
        }
    });
}

//cuento el total de los comentarios, respetando el slug como indice
function cantidadComentarios() {
    $.ajax({
        url:totalComentarios+'/'+slug,
        type:'get',
        success:function (data) {
            $('#totalComentarios').html(data);
        }
    });
}