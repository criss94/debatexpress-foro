<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateCategoriaRequest;
use App\Http\Requests\UpdateCategoriaRequest;
use Illuminate\Http\Request;
use App\Category;
use Illuminate\Support\Facades\Session;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['categorias'] = Category::all();
        $data['activo']='admin_cat';
        return view('categories.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['activo']='admin_cat';
        return view('categories.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateCategoriaRequest $request)
    {
        $category = new Category();
        $category->cat_nombre = ucwords($request->cat_nombre);
        $category->cat_descripcion = $request->cat_descripcion;
        $category->cat_slug = str_slug($request->cat_nombre);

        $category->save();
        Session::flash('saveCat','La categoria fue creada correctamente');
        return redirect()->route('categorias.show', $category->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['c'] = Category::find($id);
        $data['activo']='admin_cat';
        return view('categories.show')->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['c'] = Category::find($id);
        $data['activo']='admin_cat';
        return view('categories.edit')->with($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategoriaRequest $request, $id)
    {
        $category = Category::find($id);
        $category->cat_nombre = ucwords($request->cat_nombre);
        $category->cat_descripcion = $request->cat_descripcion;
        $category->cat_slug = str_slug($request->cat_nombre);

        $category->save();
        Session::flash('updateCat','La categoria fue actualizada correctamente');
        return redirect()->route('categorias.show', $category->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();
        Session::flash('deleteCat','La categoria fue eliminada correctamente');
        return redirect()->route('categorias.index');
    }
}
