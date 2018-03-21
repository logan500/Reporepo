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

Route::get('controlador','TurnoController@index');
Route::get('name/{nombre}','TurnoController@nombre');

Route::resource('turnos', 'TurnoController');

Route::resource('empleado', 'EmpleadoController');
// Route::group(['middleware'=>'auth'], function(){
// 	Route::resource('empleado', 'EmpleadoController');
//});


Route::resource('user', 'UserController');

Route::resource('log', 'LogController');
Route::get('logout', 'LogController@logout');


// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('saludo', function () {
    return "Bienvenido :)";
});

Route::get('user/{nombre}', function ($nombre) {
    return 'User '.$nombre;
}); 

//---------------------------------------------------------
Route::get('/','FrontController@index');
Route::get('contacto','FrontController@contacto');
Route::get('reviews','FrontController@reviews');