<?php

namespace App\Http\Controllers\Usuarios;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DataTables;


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
        $this->_model = new User();
    }

    public function index(Request $request)
    {

        if ($request->ajax()) {

            $data = User::latest()->get();

            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){

                           $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-primary btn-sm editUsuario">Edit</a>';

                           $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteProduct">Delete</a>';

                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        $users = ['username' => '' ,'email' => '' ,];
        return view('usuarios/index', compact('users'));

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
        if ($userId) {
            $user   =   User::updateOrCreate(['id' => $userId],
                            [
                                'username' => $request->username,
                                'email' => $request->email,
                            ]
                        );
        } else {

            $user   =   User::updateOrCreate(['id' => $userId],
                            [
                                'username' => $request->username,
                                'email' => $request->email,
                                'password' => $request->password
                            ]
                        );
        }

        return response()->json(['success'=>'Usuario saved successfully.']);

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
        $usuario = User::find($id);
        return response()->json($usuario);
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
        User::find($id)->delete();
        return response()->json(['success'=>'eliminado deleted successfully.']);
    }
}
