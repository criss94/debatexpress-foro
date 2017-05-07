<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        //datos foro_libre en index
        $data['foro_libre']=DB::table('tema as t')
            ->join('categorias as c','c.id','=','t.cat_id')
            ->join('users as u','u.id','=','t.user_id')
            ->select('t.titulo','t.slug','t.fecha','u.id as user_id','u.name','u.name_slug','u.genero','c.cat_nombre','c.id as cat_id','c.cat_slug','c.cat_descripcion')
            ->where('c.id',2)
            ->orderBy('t.id','desc')->limit(1)
            ->get();

        $data['cantidad_preguntas_foro']=DB::table('tema as t')
            ->join('categorias as c','c.id','=','t.cat_id')
            ->where('c.id',2)
            ->count();

        $data['cantidad_respuestas_foro']=DB::table('comentarios')
            ->where('cat_id',2)
            ->count();

        //datos humor en index
        $data['humor']=DB::table('tema as t')
            ->join('categorias as c','c.id','=','t.cat_id')
            ->join('users as u','u.id','=','t.user_id')
            ->select('t.titulo','t.slug','t.fecha','u.id as user_id','u.name','u.name_slug','u.genero','c.cat_nombre','c.id as cat_id','c.cat_slug','c.cat_descripcion')
            ->where('c.id',3)
            ->orderBy('t.id','desc')->limit(1)
            ->get();

        $data['cantidad_preguntas_humor']=DB::table('tema as t')
            ->join('categorias as c','c.id','=','t.cat_id')
            ->where('c.id',3)
            ->count();

        $data['cantidad_respuestas_humor']=DB::table('comentarios')
            ->where('cat_id',3)
            ->count();

        //datos casos paranormales en index
        $data['paranormal']=DB::table('tema as t')
            ->join('categorias as c','c.id','=','t.cat_id')
            ->join('users as u','u.id','=','t.user_id')
            ->select('t.titulo','t.slug','t.fecha','u.id as user_id','u.name','u.name_slug','u.genero','c.cat_nombre','c.id as cat_id','c.cat_slug','c.cat_descripcion')
            ->where('c.id',4)
            ->orderBy('t.id','desc')->limit(1)
            ->get();

        $data['cantidad_preguntas_paranormal']=DB::table('tema as t')
            ->join('categorias as c','c.id','=','t.cat_id')
            ->where('c.id',4)
            ->count();

        $data['cantidad_respuestas_paranormal']=DB::table('comentarios')
            ->where('cat_id',4)
            ->count();

        //datos casos curiosidades en index
        $data['curiosidades']=DB::table('tema as t')
            ->join('categorias as c','c.id','=','t.cat_id')
            ->join('users as u','u.id','=','t.user_id')
            ->select('t.titulo','t.slug','t.fecha','u.id as user_id','u.name','u.name_slug','u.genero','c.cat_nombre','c.id as cat_id','c.cat_slug','c.cat_descripcion')
            ->where('c.id',5)
            ->orderBy('t.id','desc')->limit(1)
            ->get();

        $data['cantidad_preguntas_curiosidades']=DB::table('tema as t')
            ->join('categorias as c','c.id','=','t.cat_id')
            ->where('c.id',5)
            ->count();

        $data['cantidad_respuestas_curiosidades']=DB::table('comentarios')
            ->where('cat_id',5)
            ->count();

        //datos casos libros y comics en index
        $data['libros']=DB::table('tema as t')
            ->join('categorias as c','c.id','=','t.cat_id')
            ->join('users as u','u.id','=','t.user_id')
            ->select('t.titulo','t.slug','t.fecha','u.id as user_id','u.name','u.name_slug','u.genero','c.cat_nombre','c.id as cat_id','c.cat_slug','c.cat_descripcion')
            ->where('c.id',7)
            ->orderBy('t.id','desc')->limit(1)
            ->get();

        $data['cantidad_preguntas_libros']=DB::table('tema as t')
            ->join('categorias as c','c.id','=','t.cat_id')
            ->where('c.id',7)
            ->count();

        $data['cantidad_respuestas_libros']=DB::table('comentarios')
            ->where('cat_id',7)
            ->count();

        //datos casos anime y manga en index
        $data['anime']=DB::table('tema as t')
            ->join('categorias as c','c.id','=','t.cat_id')
            ->join('users as u','u.id','=','t.user_id')
            ->select('t.titulo','t.slug','t.fecha','u.id as user_id','u.name','u.name_slug','u.genero','c.cat_nombre','c.id as cat_id','c.cat_slug','c.cat_descripcion')
            ->where('c.id',8)
            ->orderBy('t.id','desc')->limit(1)
            ->get();

        $data['cantidad_preguntas_anime']=DB::table('tema as t')
            ->join('categorias as c','c.id','=','t.cat_id')
            ->where('c.id',8)
            ->count();

        $data['cantidad_respuestas_anime']=DB::table('comentarios')
            ->where('cat_id',8)
            ->count();

        //datos casos musica en index
        $data['musica']=DB::table('tema as t')
            ->join('categorias as c','c.id','=','t.cat_id')
            ->join('users as u','u.id','=','t.user_id')
            ->select('t.titulo','t.slug','t.fecha','u.id as user_id','u.name','u.name_slug','u.genero','c.cat_nombre','c.id as cat_id','c.cat_slug','c.cat_descripcion')
            ->where('c.id',9)
            ->orderBy('t.id','desc')->limit(1)
            ->get();

        $data['cantidad_preguntas_musica']=DB::table('tema as t')
            ->join('categorias as c','c.id','=','t.cat_id')
            ->where('c.id',9)
            ->count();

        $data['cantidad_respuestas_musica']=DB::table('comentarios')
            ->where('cat_id',9)
            ->count();

        //datos casos cine y television en index
        $data['cine']=DB::table('tema as t')
            ->join('categorias as c','c.id','=','t.cat_id')
            ->join('users as u','u.id','=','t.user_id')
            ->select('t.titulo','t.slug','t.fecha','u.id as user_id','u.name','u.name_slug','u.genero','c.cat_nombre','c.id as cat_id','c.cat_slug','c.cat_descripcion')
            ->where('c.id',10)
            ->orderBy('t.id','desc')->limit(1)
            ->get();

        $data['cantidad_preguntas_cine']=DB::table('tema as t')
            ->join('categorias as c','c.id','=','t.cat_id')
            ->where('c.id',10)
            ->count();

        $data['cantidad_respuestas_cine']=DB::table('comentarios')
            ->where('cat_id',10)
            ->count();

        //datos casos deportes en index
        $data['deportes']=DB::table('tema as t')
            ->join('categorias as c','c.id','=','t.cat_id')
            ->join('users as u','u.id','=','t.user_id')
            ->select('t.titulo','t.slug','t.fecha','u.id as user_id','u.name','u.name_slug','u.genero','c.cat_nombre','c.id as cat_id','c.cat_slug','c.cat_descripcion')
            ->where('c.id',11)
            ->orderBy('t.id','desc')->limit(1)
            ->get();

        $data['cantidad_preguntas_deportes']=DB::table('tema as t')
            ->join('categorias as c','c.id','=','t.cat_id')
            ->where('c.id',11)
            ->count();

        $data['cantidad_respuestas_deportes']=DB::table('comentarios')
            ->where('cat_id',11)
            ->count();

        //datos casos guia y tutoriales en index
        $data['tutoriales']=DB::table('tema as t')
            ->join('categorias as c','c.id','=','t.cat_id')
            ->join('users as u','u.id','=','t.user_id')
            ->select('t.titulo','t.slug','t.fecha','u.id as user_id','u.name','u.name_slug','u.genero','c.cat_nombre','c.id as cat_id','c.cat_slug','c.cat_descripcion')
            ->where('c.id',12)
            ->orderBy('t.id','desc')->limit(1)
            ->get();

        $data['cantidad_preguntas_tutoriales']=DB::table('tema as t')
            ->join('categorias as c','c.id','=','t.cat_id')
            ->where('c.id',12)
            ->count();

        $data['cantidad_respuestas_tutoriales']=DB::table('comentarios')
            ->where('cat_id',12)
            ->count();

        //total de los temas para las estadisticas
        $data['total_temas']=DB::table('tema')->count();

        //total de los comentarios para las estadisticas
        $data['total_mensajes']=DB::table('comentarios')->count();

        //total de los usuarios para las estadisticas
        $data['total_usuarios']=DB::table('users')->whereNotIn('role',['admin'])->count();

        //ultimo users para las estadisticas
        $data['ult_user']=DB::table('users')
        ->select('name')
        ->whereNotIn('role',['admin'])
        ->orderBy('id','desc')->limit(1)
        ->first();

        $data['activo']='home';
        return view('index',$data);
    }

    public function pagenotfound()
    {
        return view('errors.404');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}