<?php

namespace App\Http\Controllers;

use App\Category;
use App\Comment;
use App\SubComentario;
use App\Tema;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class PublicarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['cat']=Category::all();
        $data['activo']='foros';
        return view('tema.index',$data);
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
        date_default_timezone_set('America/Argentina/Buenos_Aires');
        setlocale(LC_ALL, 'es_AR.UTF-8');

        $tema = new Tema();
        $tema->titulo = ucwords(strip_tags($request->titulo));
        $tema->mensaje = $request->mensaje;
        $tema->cat_id = $request->cat_id;
        $tema->user_id = $request->user_id;
        $tema->fecha = strftime("%d %b %Y a las %R");
        $tema->save();
        $slug = $tema->slug;

        //lo mando hacia su pregunta publicada
        $path = 'pregunta/'.$slug;
        return Redirect::to($path);
    }

    public function pregunta($slug)
    {
        $data['p']=DB::table('tema as t')
            ->join('categorias as c','c.id','=','t.cat_id')
            ->join('users as u','u.id','=','t.user_id')
            ->select('t.id','t.titulo','t.slug','t.fecha','t.mensaje','t.cat_id','t.visitas','t.like_tema','u.id as user_id','u.name as user_name','name_slug','c.cat_nombre','c.cat_slug')
            ->where('t.slug',$slug)
            ->first();
        $data['activo']='foros';

        $data['totalRespuestas']=DB::table('comentarios as com')
            ->where('com.slug',$slug)
            ->count();

        return view('tema.vista_pregunta',$data);
    }

    public function likesTema($slug){
        $temaLike = DB::table('tema')
        ->select('like_tema')
        ->where('slug',$slug)
        ->get();

        foreach ($temaLike as $t) {
            echo '<a data-id="" title="Me gusta" id="me-gusta-el-tema" style="font-size: 20px;color: #0778C4;cursor: pointer;"><i class="fa fa-thumbs-up" aria-hidden="true"></i></a><span style="margin-right: 10px"> '.$t->like_tema.'</span>';
        }

    }

    public function likeTema($slug, $id)
    {
        if (!session()->has("tema".$id)) {
            $saveTemaID = session()->put("tema".$id,1);
            $likeTema = session()->get("tema".$id);
                $tema = DB::table('tema')
                ->where('slug', $slug)
                ->where('id', $id);
                $tema->increment('like_tema',$likeTema);
                //echo 'ya le dio a like!';
                //session()->forget("tema".$id); 

                $temaLike = DB::table('tema')
                ->select('like_tema')
                ->where('slug',$slug)
                ->get();

                foreach ($temaLike as $t) {
                    echo '<a data-id="" title="Me gusta" id="me-gusta-el-tema" style="font-size: 20px;color: #0E3778;cursor: pointer;"><i class="fa fa-thumbs-up" aria-hidden="true"></i></a><span style="margin-right: 10px"> '.$t->like_tema.'</span>';
                }

        }else{
              $temaLike = DB::table('tema')
                ->select('like_tema')
                ->where('slug',$slug)
                ->get();

                foreach ($temaLike as $t) {
                    echo '<a data-id="" title="Me gusta" id="me-gusta-el-tema" style="font-size: 20px;color: blue;cursor: pointer;"><i class="fa fa-thumbs-up" aria-hidden="true"></i></a><span style="margin-right: 10px"> '.$t->like_tema.'</span>';
                }
        }
    }

    public function visitas($slug)
    {
        if (!session()->has($slug)) {
            $saveSlug = session()->put($slug,1);
            $getViews = session()->get($slug);
                $visitas = DB::table('tema')
                ->where('slug', $slug);
                $visitas->increment('visitas',$getViews);

                $vi = DB::table('tema')
                ->select('visitas')
                ->where('slug',$slug)
                ->get();
                return response()->json($vi);

        }else{
            // no hace nada
        }
    }

    public function respuesta(Request $request)
    {
        date_default_timezone_set('America/Argentina/Buenos_Aires');
        setlocale(LC_ALL, 'es_AR.UTF-8');
        $com = new Comment();
        $com->name = $request->name;
        $com->comentario = $request->comentario;
        $com->slug = $request->slug;
        $com->user_id = $request->user_id;
        $com->cat_id = $request->cat_id;
        $com->tema_id = $request->tema_id;
        $com->fecha = strftime("%d %b %Y a las %R");
        $com->genero = $request->genero;
        $com->save();
        $slug = $com->slug;
        $path = 'pregunta/'.$slug;
        return Redirect::to($path);
    }

    public function listarRespuestas($slug)
    {
        $data['respuestas'] = DB::table('comentarios as com')
            //->join('sub_comentario as sub','sub.id_comentario','com.id')
            ->join('users as u','u.id','com.user_id')
            ->join('categorias as cat','cat.id','com.cat_id')
            ->join('tema as te','te.id','com.tema_id')
            ->select('com.id as id_coment','com.comentario','com.like','com.fecha','u.id as user_id','u.name as user_name','u.name_slug','u.genero','cat.id as cat_id','cat.cat_nombre as cat_nombre_resp','te.id as tema_id','te.visitas','com.slug')
            ->where('com.slug',$slug)
            ->orderBy('com.id','desc')->limit(5)
            ->get();

        return view('tema.conversaciones',$data);
    }

    public function totalComentarios($slug)
    {
        $data = DB::table('comentarios')
            ->where('slug',$slug)
            ->count();
        if ($data == 0){
            echo '<p>'.$data.' respuestas</p>';
        }elseif($data == 1){
            echo '<p>'.$data.' respuesta</p>';
        }else{
            echo '<p>'.$data.' respuestas</p>';
        }
    }

    public function listarComentarioPorId($id_coment)
    {
       $data=DB::table('comentarios')
        ->select('id','comentario')
        ->where('id',$id_coment)
        ->first();
        return response()->json($data);
    }

    public function editarMiComentario(Request $request, $id_coment)
    {
        if ($request->ajax()) {
            $com = Comment::findOrFail($id_coment);
            $com->comentario = $request->comentario;
            $com->update();
        }else{
            echo 'error';
        }
    }

    public function eliminarComentarioPorId($id_coment)
    {
        $com = Comment::findOrFail($id_coment);
        $com->delete();
    }

    public function like($slug, $id_coment)
    {
        // estilo laravel
        if (!session()->has("like".$id_coment)) {
            $saveID = session()->put("like".$id_coment,1);
            $likeID = session()->get("like".$id_coment);
                $com = DB::table('comentarios')
                ->where('slug', $slug)
                ->where('id', $id_coment);
                $com->increment('like',$likeID);
               
                session()->forget("deletelike".$id_coment);
                
        }elseif(!session()->has("deletelike".$id_coment)){
            $saveID = session()->put("deletelike".$id_coment,1);
            $likeID = session()->get("deletelike".$id_coment);
                $com = DB::table('comentarios')
                ->where('slug', $slug)
                ->where('id', $id_coment);
                $com->decrement('like',$likeID);
               
                session()->forget("like".$id_coment);
                
        }

        // }else{
        //     //session()->forget("like".$id_coment);
        //     //session()->forget("deletelike".$id_coment);
        //     echo 'else';
        // }

        // estilo php
        // session_start();
        // if (!isset($_SESSION["like".$id_coment])) {
        //     $likeID = $_SESSION["like".$id_coment]=1;
        //         $com = DB::table('comentarios')
        //         ->where('slug', $slug)
        //         ->where('id', $id_coment);
        //         $com->increment('like',$likeID);
        // }else{
        //     echo 'no puede dar me gusta';
        // }

    }

    // public function dislike($slug, $id_coment)
    // {
    //     if (!session()->has("dislike".$id_coment)) {
    //         $saveID = session()->put("dislike".$id_coment,1);
    //         $likeID = session()->get("dislike".$id_coment);
    //             $com = DB::table('comentarios')
    //             ->where('slug', $slug)
    //             ->where('id', $id_coment);
    //             $com->increment('dislike',$likeID);

    //             session()->forget("deletedislike".$id_coment);

    //     }elseif(!session()->has("deletedislike".$id_coment)){
    //         //echo 'ya le dio a me gusta';
    //         $saveID = session()->put("deletedislike".$id_coment,1);
    //         $likeID = session()->get("deletedislike".$id_coment);
    //             $com = DB::table('comentarios')
    //             ->where('slug', $slug)
    //             ->where('id', $id_coment);
    //             $com->decrement('dislike',$likeID);
               
    //             session()->forget("dislike".$id_coment);
    //     }

    // }

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
