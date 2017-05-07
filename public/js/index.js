$(document).ready(function () {

    //buscador
    $('#buscadorGeneral').submit(function(e){
        e.preventDefault();
        var ruta = $(this).attr('action');
        var user = $('#nameUser').val();
        var user_sin_espacios = $.trim(user);

        if(user_sin_espacios == ''){
            return false;
        }
        else{
            window.location.href=ruta+'/'+user;
        }

    });

    // minimiso las categorias del index
    $('#hiden-cat').on('click',function (e) {
        e.preventDefault();
        $('.caja-cat').slideToggle();
        $('#show-cat').show();
        $('#hiden-cat').hide();
    });

    $('#show-cat').on('click',function (e) {
        e.preventDefault();
        $('.caja-cat').slideToggle();
        $('#hiden-cat').show();
        $('#show-cat').hide();
    });

    // cambio el estado del logout al hacer click
    $('#logout').on('click',function () {
        $(this).addClass('activo');
        $(this).css('color','white');
    });

});