<?php

Route::get('/','IndexController@index');

Route::get('pagenotfound',['as'=>'notfound','uses'=>'IndexController@pagenotfound']);

////////////////////////////////////////////////////////////
//cuando la pagina no existe lo mandamos a una personalizada
Route::get('error',function(){
    abort(404);
});
Route::get('foros/{num}',function(){
    abort(404);
});
Route::get('foros/{num}/(:any)',function(){
    abort(404);
});
Route::get('miembros/{num}',function(){
    abort(404);
});
Route::get('miembros/{num}/(:any)',function(){
    abort(404);
});
Route::get('pregunta/{slug}/(:any)',function(){
    abort(404);
});
Route::get('search/{palabra}/{error}',function(){
    abort(404);
});
///////////////////////////////////////////////////

Auth::routes();
Route::get('home','IndexController@index');
//autenticacion con facebook, gmail y twitter
Route::get('auth/{provider}', 'Auth\LoginController@redirectToProvider');
Route::get('auth/{provider}/callback', 'Auth\LoginController@handleProviderCallback');

//el usuario solo puede mirar la pregunta, pero no responderla
Route::get('pregunta/{slug}','PublicarController@pregunta');
Route::get('listarRespuestas/{slug}','PublicarController@listarRespuestas');
Route::get('traerRespuestas/{slug}','PublicarController@listarRespuestas');
Route::get('totalComentarios/{slug}','PublicarController@totalComentarios');

// ruta para aumentar las visitas
Route::get('visitas/{slug}','PublicarController@visitas');

//ruta del link foros
Route::get('foros','ForosController@index');
Route::any('foros/{id}/{cat_slug?}','ForosController@vista_foro');
//ruta de los miembros o usuarios
Route::get('miembros','MiembrosController@index');
Route::get('miembros/{id}/{name_slug}','MiembrosController@perfil');

//buscador de miembros o usuarios
Route::get('search/{user}','MiembrosController@search');

//ruta donde se publica un nuevo tema de conversacion
Route::group(['middleware' => ['auth']], function () {
    Route::get('tema','PublicarController@index');
    Route::post('tema/store','PublicarController@store');
    Route::post('respuesta','PublicarController@respuesta');
    Route::post('saveSubRespuesta','PublicarController@saveSubRespuesta');

	//ruta para aumentar los likes al tema, la primera ruta trae los likes
	// y el html y la segunda hace el incremento
	Route::get('likesTema/{slug}','PublicarController@likesTema');
	Route::get('likeTema/{slug}/{id}','PublicarController@likeTema');
    
    // listo el comentario, pero solo el que el usuario elija
    Route::get('listarComentarioPorId/{id}','PublicarController@listarComentarioPorId');
    // edito el comentario que el usuario modifico
    Route::resource('editarMiComentario','PublicarController@editarMiComentario');
    // el usuario elimina su comentario
    Route::get('eliminarComentarioPorId/{id}','PublicarController@eliminarComentarioPorId');
    //  ruta para aumentar los likes en el comentario
    Route::get('like/{slug}/{id_coment}','PublicarController@like');
    //  ruta para aumentar los dislikes en el comentario
    //Route::get('dislike/{slug}/{id_coment}','PublicarController@dislike');
});

Route::group(['middleware' => ['Admin']], function () {
    // panel pricipal de menu del Admin
    Route::get('admin', 'Admin\AdminController@index');

    //Route::resource('foros', 'ForoController');
    Route::resource('categorias', 'Admin\CategoryController');
});