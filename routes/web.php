<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

<<<<<<< HEAD
Auth::routes();

Route::resource('usuarios', 'Usuarios\UsuariosController');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/mantenimiento', 'Mantenimiento\AdministracionController@moduloAdministracion')->name('administracion');
=======
Route::resource('/tipo_establecimiento', 'testablecimientoController');
Route::resource('/pais', 'paisController');
>>>>>>> KaiserDeveloper
