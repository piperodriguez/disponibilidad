<?php

namespace App\Http\Controllers\Usuarios;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Redirect,Response;
use Illuminate\Support\Facades\DB;
use App\Modelos\Usuarios;


    /**
     * clase UsuariosController
     * fecha creación: 13/11/2019
     *
     * @author  Felipe Rodríguez Vargas (vargasjuan367@gmail.com)
     * @return Lista de usuarios en un array
     */


class UsuariosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    private $_model;

    function __construct()
    {
        $this->middleware('auth');
        $this->_model = new Usuarios();
    }

    public function index()
    {
        //$datos['usuarios'] = $this->_model->all();
        $datos['usuarios'] = Usuarios::orderBy('id','desc')->paginate(8);
        return view('usuarios/index', compact('datos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $userId = $request->user_id;
        $user   =   Usuarios::updateOrCreate(['id' => $userId],
                        [
                            'username' => $request->username,
                            'email' => $request->email
                        ]
                    );
        return Response::json($user);
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
        $where = array('id' => $id);
        $user  = Usuarios::where($where)->first();

        return Response::json($user);
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
        $user = Usuarios::where('id',$id)->delete();
        return Response::json($user);
    }
}
