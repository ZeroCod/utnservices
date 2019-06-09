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

Route::get('/', 'IndexController@index')->name('index');

Route::get('/app', function () {
    return view('layouts.app');
});

Route::get('/usuario/perfil', 'UserController@perfil')->name('perfil');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/inicio', 'VisitanteController@index')->name('inicio');

//actualizar info basica
Route::get('/usuario/actualizar', 'UserController@actualizarPerfil')->name('actualizarInformacion');
Route::post('/usuario/actualizar/fetch', 'UserController@fetch')->name('actualizarInformacion.fetch');
Route::put('/usuario/actualizar', 'UserController@actualizarInfoPersonal')->name('actualizarInfoPersonal');


//config cuenta
Route::get('/usuario/configuracion', 'UserController@configuracionCuenta')->name('configuracion');
Route::PUT('/usuario/cambiar-email', 'UserController@cambiarEmail')->name('cambiar-email');
Route::PUT('/usuario/cambiar-password', 'UserController@cambiarPassword')->name('cambiar-password');


//post
Route::get('/nuevo-servicio', 'PublicacionController@crear')->name('nuevo-servicio');
Route::post('/guardar-servicio', 'PublicacionController@store')->name('guardar-servicio');

//experiencia
Route::get('/experiencia', 'AgregarExpController@experiencia')->name('experiencia');
Route::post('/guardar-experiencia', 'AgregarExpController@guardar')->name('guardar-experiencia');


Route::get('/pruebas', 'PublicacionController@prueba');