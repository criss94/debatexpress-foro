<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Foro;

class ForoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $foros['activo']='foros';
        $foros = Foro::orderBy('id', 'desc')->paginate(10);
        return view('foros.index')->withForos($foros);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('foros.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|min:3|max:100',
            'message' => 'required|min:10',
            'votes' => 'required|boolean',
            'user_id' => 'required|integer'
        ]);

        $foro = new Foro();
        $foro->title = $request->title;
        $foro->message = Purifier::clean($request->message);
        $foro->user_id = $request->user_id;

        $foro->save();

        return redirect()->route('foros.show', $foro->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $foro = Foro::find($id);
        return view('foros.show')->withForo($foro);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $foro = Foro::find($id);
        return view('foros.edit')->withForo($foro);
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
        $this->validate($request, [
            'title' => 'required|min:3|max:100',
            'message' => 'required|min:10',
        ]);
        $foro = Foro::find($id);
        $foro->title = $request->title;
        $foro->message = Purifier::clean($request->message);

        $foro->save();

        return redirect()->route('foros.show', $foro->id);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $foro = Foro::find($id);
        $foro->delete();

        return redirect()->route('foros.index');
    }
}
