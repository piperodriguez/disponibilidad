<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Modelos\PaisModel;

class paisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos['pais']=PaisModel::paginate(5);
        return view('pais.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pais.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $datospais=request()->except('_token');
        $modelo= new PaisModel();
        $modelo::insert($datospais);

        return redirect('pais');
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
    public function edit($id_pais)
    {
        $dato=PaisModel::findOrFail($id_pais);
        return view('pais.edit', compact('dato'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_pais)
    {
        $datos=request()->except(['_token', '_method']);
        $modelo= new PaisModel();
        $modelo::where('id_pais', '=', $id_pais)->update($datos);

        $dato=PaisModel::findOrFail($id_pais);
        return view('pais.edit', compact('dato'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dato=PaisModel::findOrFail($id);
        /*dd($dato);*/
        $dato->delete();
        return redirect('pais');
    }
}
