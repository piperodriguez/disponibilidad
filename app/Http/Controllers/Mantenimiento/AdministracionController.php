<?php

namespace App\Http\Controllers\Mantenimiento;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdministracionController extends Controller
{
    //verifica que el usuario tenga session iniciada para acceder
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function moduloAdministracion(Request $request)
    {
       $request->user()->authorizeRoles(['admin']);
       return view('mantenimiento/index');
    }
}
