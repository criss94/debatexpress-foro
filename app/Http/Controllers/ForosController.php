<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ForosController extends Controller
{
    public function index()
    {
        //#####################################################################
        // mostramos los ultimos temas publicados, copiamos el codigo del index
        //#####################################################################
        
        $data['foro']=DB::table('tema as t')
            ->join('categorias as c','c.id','=','t.cat_id')
            ->join('users as u','u.id','=','t.user_id')
            ->select('t.titulo','t.slug','t.fecha','u.id as user_id','u.name','u.name_slug','u.genero','c.cat_nombre','c.id as cat_id','c.cat_slug','c.cat_descripcion')
            ->where('c.id',2)
            ->orderBy('t.id','desc')->limit(1)
            ->get();

        $data['total_temas_foro']=DB::table('tema as t')
            ->join('categorias as c','c.id','=','t.cat_id')
            ->where('c.id',2)
            ->count();

        $data['total_comentarios_foro']=DB::table('comentarios')
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

        $data['total_temas_humor']=DB::table('tema as t')
            ->join('categorias as c','c.id','=','t.cat_id')
            ->where('c.id',3)
            ->count();

        $data['total_comentarios_humor']=DB::table('comentarios')
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

        $data['total_temas_paranormal']=DB::table('tema as t')
            ->join('categorias as c','c.id','=','t.cat_id')
            ->where('c.id',4)
            ->count();

        $data['total_comentarios_paranormal']=DB::table('comentarios')
            ->where('cat_id',4)
            ->count();

        //datos casos curiosidades en index
        $data['curiosidad']=DB::table('tema as t')
            ->join('categorias as c','c.id','=','t.cat_id')
            ->join('users as u','u.id','=','t.user_id')
            ->select('t.titulo','t.slug','t.fecha','u.id as user_id','u.name','u.name_slug','u.genero','c.cat_nombre','c.id as cat_id','c.cat_slug','c.cat_descripcion')
            ->where('c.id',5)
            ->orderBy('t.id','desc')->limit(1)
            ->get();

        $data['total_temas_curiosidad']=DB::table('tema as t')
            ->join('categorias as c','c.id','=','t.cat_id')
            ->where('c.id',5)
            ->count();

        $data['total_comentarios_curiosidad']=DB::table('comentarios')
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

        $data['total_temas_libros']=DB::table('tema as t')
            ->join('categorias as c','c.id','=','t.cat_id')
            ->where('c.id',7)
            ->count();

        $data['total_comentarios_libros']=DB::table('comentarios')
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

        $data['total_temas_anime']=DB::table('tema as t')
            ->join('categorias as c','c.id','=','t.cat_id')
            ->where('c.id',8)
            ->count();

        $data['total_comentarios_anime']=DB::table('comentarios')
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

        $data['total_temas_musica']=DB::table('tema as t')
            ->join('categorias as c','c.id','=','t.cat_id')
            ->where('c.id',9)
            ->count();

        $data['total_comentarios_musica']=DB::table('comentarios')
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

        $data['total_temas_cine']=DB::table('tema as t')
            ->join('categorias as c','c.id','=','t.cat_id')
            ->where('c.id',10)
            ->count();

        $data['total_comentarios_cine']=DB::table('comentarios')
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

        $data['total_temas_deportes']=DB::table('tema as t')
            ->join('categorias as c','c.id','=','t.cat_id')
            ->where('c.id',11)
            ->count();

        $data['total_comentarios_deportes']=DB::table('comentarios')
            ->where('cat_id',11)
            ->count();

        //datos casos guia y tutoriales en index
        $data['guia']=DB::table('tema as t')
            ->join('categorias as c','c.id','=','t.cat_id')
            ->join('users as u','u.id','=','t.user_id')
            ->select('t.titulo','t.slug','t.fecha','u.id as user_id','u.name','u.name_slug','u.genero','c.cat_nombre','c.id as cat_id','c.cat_slug','c.cat_descripcion')
            ->where('c.id',12)
            ->orderBy('t.id','desc')->limit(1)
            ->get();

        $data['total_temas_guia']=DB::table('tema as t')
            ->join('categorias as c','c.id','=','t.cat_id')
            ->where('c.id',12)
            ->count();

        $data['total_comentarios_guia']=DB::table('comentarios')
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

        


        //foro lobre
        $data['foro_l']=DB::table('categorias')
        ->select('id','cat_nombre','cat_descripcion','cat_slug')
        ->where('id',2)
        ->get();

        $data['total_temas_foro']=DB::table('tema')
            ->where('cat_id',2)
            ->count();

        $data['total_comentarios_foro']=DB::table('comentarios')
            ->where('cat_id',2)
            ->count();

        //foro lobre
        $data['humor_l']=DB::table('categorias')
        ->select('id','cat_nombre','cat_descripcion','cat_slug')
        ->where('id',3)
        ->get();

        $data['total_temas_humor']=DB::table('tema')
            ->where('cat_id',3)
            ->count();

        $data['total_comentarios_humor']=DB::table('comentarios')
            ->where('cat_id',3)
            ->count();

        //foro casos paranormales
        $data['paranormal_l']=DB::table('categorias')
        ->select('id','cat_nombre','cat_descripcion','cat_slug')
        ->where('id',4)
        ->get();

        $data['total_temas_paranormal']=DB::table('tema')
            ->where('cat_id',4)
            ->count();

        $data['total_comentarios_paranormal']=DB::table('comentarios')
            ->where('cat_id',4)
            ->count();

        //foro curiosidades
        $data['curiosidad_l']=DB::table('categorias')
        ->select('id','cat_nombre','cat_descripcion','cat_slug')
        ->where('id',5)
        ->get();

        $data['total_temas_curiosidad']=DB::table('tema')
            ->where('cat_id',5)
            ->count();

        $data['total_comentarios_curiosidad']=DB::table('comentarios')
            ->where('cat_id',5)
            ->count();

            //foro libros
        $data['libros_l']=DB::table('categorias')
        ->select('id','cat_nombre','cat_descripcion','cat_slug')
        ->where('id',7)
        ->get();

        $data['total_temas_libros']=DB::table('tema')
            ->where('cat_id',7)
            ->count();

        $data['total_comentarios_libros']=DB::table('comentarios')
            ->where('cat_id',7)
            ->count();

            //foro anime
        $data['anime_l']=DB::table('categorias')
        ->select('id','cat_nombre','cat_descripcion','cat_slug')
        ->where('id',8)
        ->get();

        $data['total_temas_anime']=DB::table('tema')
            ->where('cat_id',8)
            ->count();

        $data['total_comentarios_anime']=DB::table('comentarios')
            ->where('cat_id',8)
            ->count();

            //foro musica
        $data['musica_l']=DB::table('categorias')
        ->select('id','cat_nombre','cat_descripcion','cat_slug')
        ->where('id',9)
        ->get();

        $data['total_temas_musica']=DB::table('tema')
            ->where('cat_id',9)
            ->count();

        $data['total_comentarios_musica']=DB::table('comentarios')
            ->where('cat_id',9)
            ->count();

            //foro cine
        $data['cine_l']=DB::table('categorias')
        ->select('id','cat_nombre','cat_descripcion','cat_slug')
        ->where('id',10)
        ->get();

        $data['total_temas_cine']=DB::table('tema')
            ->where('cat_id',10)
            ->count();

        $data['total_comentarios_cine']=DB::table('comentarios')
            ->where('cat_id',10)
            ->count();

            //foro deportes
        $data['deportes_l']=DB::table('categorias')
        ->select('id','cat_nombre','cat_descripcion','cat_slug')
        ->where('id',11)
        ->get();

        $data['total_temas_deportes']=DB::table('tema')
            ->where('cat_id',11)
            ->count();

        $data['total_comentarios_deportes']=DB::table('comentarios')
            ->where('cat_id',11)
            ->count();

            //foro guia
        $data['guia_l']=DB::table('categorias')
        ->select('id','cat_nombre','cat_descripcion','cat_slug')
        ->where('id',12)
        ->get();

        $data['total_temas_guia']=DB::table('tema')
            ->where('cat_id',12)
            ->count();

        $data['total_comentarios_guia']=DB::table('comentarios')
            ->where('cat_id',12)
            ->count();
        

        $data['activo']='foros';
        return view('foros.index',$data);
    }

    public function vista_foro($id, $cat)
    {
        $data['foros']=DB::table('tema as t')
        ->join('users as u','u.id','=','t.user_id')
        ->leftJoin('comentarios as com','com.tema_id','=','t.id')
        ->select('t.id','u.id as user_id','u.name','u.name_slug','t.slug','u.genero','t.cat_id','t.titulo','t.fecha','t.visitas',DB::raw('COUNT(com.tema_id) as total_respuestas'))
        ->where('t.cat_id',$id)
        ->groupBy('t.id','u.id','u.name','u.name_slug','t.slug','u.genero','t.cat_id','t.titulo','t.fecha','t.visitas')
        ->orderBy('t.id','desc')
        ->paginate(15);

        $data['t']=DB::table('categorias')
            ->where('id',$id)
            ->select('cat_nombre','cat_descripcion')
            ->first();

        $data['activo']='foros';
        return view('foros.vista_foro',$data);
    }
}
