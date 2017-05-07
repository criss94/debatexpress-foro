<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Redirect;

class MiembrosController extends Controller
{
    public function index()
    {
    	$data['listado_miembros']=DB::table('users as u')
    	->join('comentarios as com','com.user_id','=','u.id')
    	->join('tema as t','t.id','=','com.tema_id')
    	->select('u.id','u.name','name_slug','u.avatar','u.genero', DB::raw('COUNT(com.user_id) as total_comentarios'), DB::raw('COUNT(t.user_id) as total_temas'))
    	->whereNotIn('u.role',['admin'])
    	->groupBy('u.id','u.name','name_slug','u.genero')
    	->orderBy('total_comentarios','desc')
    	->limit(20)
    	->get();

    	$data['new_miembros']=DB::table('users')
    	->select('id','name','name_slug','created_at','role','genero','activo')
    	->whereNotIn('role',['admin'])
    	->orderBy('created_at','desc')
    	->limit(12)
    	->get();

    	$data['activo']='miembros';
    	return view('miembros.index',$data);
    }

    public function perfil($id, $name_slug)
    {
    	$data['u']=DB::table('users')
    	->select('name','avatar','created_at','updated_at','genero','activo')
    	->where('id',$id)
    	->first();

    	$data['total_temas']=DB::table('tema')
        ->where('user_id',$id)
        ->count();

        $data['total_comentarios']=DB::table('comentarios')
    	->where('user_id',$id)
    	->count();

    	$data['total_likes']=DB::table('tema')
    	->select(DB::raw('SUM(like_tema) as likes'))
    	->where('user_id',$id)
    	->get();

    	$data['temas']=DB::table('tema as t')
    	->join('categorias as c','c.id','=','t.cat_id')
    	->join('users as u','u.id','=','t.user_id')
    	->select('u.id as user_id','u.name','u.name_slug','u.avatar','u.activo','t.titulo','t.slug as tema_slug','t.fecha','c.id as cat_id','c.cat_nombre','c.cat_slug')
    	->where('user_id',$id)
    	->orderBy('t.id','desc')
    	->limit(20)
    	->get();

    	$data['activo']='miembros';

    	return view('miembros.perfil',$data	);
    }

    public function search($userName)
    {
        $user = DB::table('users')
        ->select('id','name','name_slug','avatar')
        ->where('name',$userName)
        ->first();

        if (count($user) != 0) {
            $id = $user->id;        
            $name = $user->name;
            $slug = $user->name_slug;

            $result = 'miembros/'.$id.'/'.$slug;
            return Redirect::to($result);
        }else{
            $data['new_miembros']=DB::table('users')
            ->select('id','name','name_slug','avatar','created_at','role','genero','activo')
            ->whereNotIn('role',['admin'])
            ->orderBy('created_at','desc')
            ->limit(12)
            ->get();

            $data['usuarioBuscado'] = $userName;

            $data['activo']='miembros';
            return view('usuarioNoEncontrado',$data);
        }
        
    }

}
