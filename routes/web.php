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

Route::get('/manage', function(){
    return view('manage');
});

Route::get('/dashboard','DashboardController@index')->name('Dashboard')->middleware('auth');
Route::post('/dashboard','DashboardController@recarga')->name('Dashboard');

//EQUIPOS
Route::get('/equipos', 'EquiposController@index')->name('Equipos');
Route::get('/equipos/detalles/{equipo}','EquiposController@details')->name('Equipos.details');

Route::get('/equipos/editar/{equipo}','EquiposController@edit')->name('Equipos.edit');
Route::post('/equipos/save', 'EquiposController@saveChanges')->name('Equipos.save');

Route::get('/equipos/nuevo', 'EquiposController@nuevoEquipo')->name('Equipos.new');
Route::post('/equipos/create', 'EquiposController@create')->name('Equipos.create');

Route::delete('/equipos/{Equipo} ', 'EquiposController@delete')->name('Equipos.delete');

//JORNADAS
Route::get('jornadas', 'JornadasController@index')->name('jornadas');
Route::post('jornadas', 'JornadasController@index')->name('jornadas');
Route::get('/jornadas/create','JornadasController@create')->name('jornadas.crear');
Route::post('/jornadas/guardar', 'JornadasController@guardar')->name('jornadas.guardar');

Route::get('/partido/{id}/details', 'JornadasController@match_details')
    ->where('id','[0-9]+')
    ->name('jornadas.partido');

Route::get('/partido/{id}','JornadasController@editarPartido')->name('jornadas.edita');
Route::post('/partido', 'JornadasController@guardarEdicion')->name('jornadas.modificado');

Route::get('/jornadas/resumen','JornadasController@jornadas')->name('jornadas.jornadas');
Route::post('/jornadas/resultados', 'JornadasController@resultados')->name('jornadas.journal');
Route::post('/jornadas/feed', 'JornadasController@feed')->name('jornadas.feed');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

