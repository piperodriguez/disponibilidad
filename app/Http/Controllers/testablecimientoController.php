<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Modelos\TipoEstablecimientoModel;


class testablecimientoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos['tipo_establecimiento']=TipoEstablecimientoModel::paginate(5);
        return view('tipo_establecimiento.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tipo_establecimiento.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $datostestablecimiento=request()->except('_token');
        $modelo= new TipoEstablecimientoModel();
        $modelo::insert($datostestablecimiento);

        return redirect('tipo_establecimiento');
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
    public function edit($id_testablecimiento)
    {
        $dato=TipoEstablecimientoModel::findOrFail($id_testablecimiento);
        return view('tipo_establecimiento.edit', compact('dato'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_testablecimiento)
    {
        $datos=request()->except(['_token', '_method']);
        $modelo= new TipoEstablecimientoModel();
        $modelo::where('id_testablecimiento', '=', $id_testablecimiento)->update($datos);

        $dato=TipoEstablecimientoModel::findOrFail($id_testablecimiento);
        return view('tipo_establecimiento', compact('dato'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dato=TipoEstablecimientoModel::findOrFail($id);
        /*dd($dato);*/
        $dato->delete();
        return redirect('tipo_establecimiento');        
    }
}
