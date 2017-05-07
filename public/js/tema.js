$(document).ready(function(){

    $("#formPublicar").submit(function(){

        //var content = tinymce.get("mensaje").getContent();
        //$("#mensaje").html(content);
        // campos obligatorios
        var titulo=$('.titulo-pub').val();
        var categoria=$('.select_pub').val();
        //var resp = tinymce.get("mensaje").getContent();
        var resp = CKEDITOR.instances.mensaje.getData();

        //verificamos todos en uno
        if (titulo+categoria+resp == '' ){
            $('#error_titulo_pub').html('<span class="titulo_vacio">' +
                'El titulo no puede estar vacio' +
                '<a href="#" id="delete_titulo_error" title="Cerrar este mensaje">X</a>'+
                '</span>').fadeIn(600);
            $('#delete_titulo_error').on('click',function (e) {
                e.preventDefault();
                $('.titulo_vacio').fadeOut(600);
                return false;
            });

            $('#error_cat_pub').html('<span class="cat_vacio">' +
                'Seleccioná la categoria donde sera publicada tu nuevo tema' +
                '<a href="#" id="delete_cat_error" title="Cerrar este mensaje">X</a>'+
                '</span>').fadeIn(600);
            $('#delete_cat_error').on('click',function (e) {
                e.preventDefault();
                $('.cat_vacio').fadeOut(600);
                return false;
            });


            $('#mensaje_vacio_pub').html('<span class="mensaje_vacio">' +
                'Este campo es obligatorio para que su pregunta sea respondida' +
                '<a href="#" id="delete_message_error" title="Cerrar este mensaje">X</a>'+
                '</span>').fadeIn(600);
            $('#delete_message_error').on('click',function (e) {
                e.preventDefault();
                $('.mensaje_vacio').fadeOut(600);
                return false;
            });
        }

        //si esta vacio el titulo
        if (titulo == ''){
            $('#error_titulo_pub').html('<span class="titulo_vacio">' +
                'El titulo no puede estar vacio' +
                '<a href="#" id="delete_titulo_error" title="Cerrar este mensaje">X</a>'+
                '</span>').fadeIn(600);

            $('#delete_titulo_error').on('click',function (e) {
                e.preventDefault();
                $('.titulo_vacio').fadeOut(600);
                return false;
            });
            return false;
            //si menor a 15 caracteres el titulo
        }else if(titulo.length < 3){
            $('#error_titulo_pub').html('<span class="titulo_vacio">' +
                'El titulo debe contener como minimo 3 caracteres' +
                '<a href="#" id="delete_titulo_error" title="Cerrar este mensaje">X</a>'+
                '</span>').fadeIn(600);
            $('#delete_titulo_error').on('click',function (e) {
                e.preventDefault();
                $('.titulo_vacio').fadeOut(600);
                return false;
            });
            return false;
        }

        //si la cat esta vacia
        if (categoria == ''){
            $('#error_cat_pub').html('<span class="cat_vacio">' +
                'Seleccioná la categoria correspondiente para tu Tema' +
                '<a href="#" id="delete_cat_error" title="Cerrar este mensaje">X</a>'+
                '</span>').fadeIn(600);

            $('#delete_cat_error').on('click',function (e) {
                e.preventDefault();
                $('.cat_vacio').fadeOut(600);
                return false;
            });
            return false;
        }

        //si la descripcion del mensaje esta vacio
        if (resp == ''){
            $('#mensaje_vacio_pub').html('<span class="mensaje_vacio">' +
                'Este campo es obligatorio para que su pregunta sea respondida' +
                '<a href="#" id="delete_message_error" title="Cerrar este mensaje">X</a>'+
                '</span>').fadeIn(600);
            //vacia el contenido del editor
            //tinymce.activeEditor.setContent("");
            CKEDITOR.instances.mensaje.setData("")
            $('#delete_message_error').on('click',function (e) {
                e.preventDefault();
                $('.mensaje_vacio').fadeOut(600);
                return false;
            });
            return false;
            //si la descripcion del mensaje es menor a 37
        }else if (resp.length > 1 && resp.length < 3){
            $('#mensaje_vacio_pub').html('<span class="mensaje_vacio">' +
                'La descripción debe contener un minimo de 2 caracteres como máximo' +
                '<a href="#" id="delete_message_error" title="Cerrar este mensaje">X</a>'+
                '</span>').fadeIn(600);
            //vacia el contenido del editor
            //tinymce.activeEditor.setContent("");
            CKEDITOR.instances.mensaje.setData("")
            $('#delete_message_error').on('click',function (e) {
                e.preventDefault();
                $('.mensaje_vacio').fadeOut(600);
                return false;
            });
            return false;
        }

    });

});