<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::get('user/{id}', 'UserController@edit')->name('user.edit');
Route::put('users/{id}', 'UserController@update')->name('user.update');

//Perfiles
Route::get('/perfiles', 'PerfilController@index')->name('perfil.index');
Route::get('/perfil/create','PerfilController@create')->name('perfil.create');
Route::post('/perfil', 'PerfilController@store')->name('perfil.store');
Route::get('/perfil/{id}', 'PerfilController@show')->name('perfil.show');
Route::get('/perfil/{id}/edit', 'PerfilController@edit')->name('perfil.edit');
Route::put('/perfil/{id}','PerfilController@update')->name('perfil.update');

//Proyectos
Route::get('/proyectos', 'ProyectosController@index')->name('proyectos.index');
Route::get('/proyectos/create', 'ProyectosController@create')->name('proyectos.create');
Route::post('/proyectos', 'ProyectosController@store')->name('proyectos.store');
Route::get('/proyectos/{id}', 'ProyectosController@show')->name('proyectos.show');
Route::get('/proyectos/{id}/edit', 'ProyectosController@edit')->name('proyectos.edit');
Route::put('/proyectos/{id}', 'ProyectosController@update')->name('proyectos.update');
Route::delete('/proyectos/{id}', 'ProyectosController@delete')->name('proyectos.delete');

//Direcciones Generales
Route::get('/dgs', 'DgController@index')->name('dg.index');
Route::get('/dgs/create', 'DgController@create')->name('dg.create');
Route::post('/dgs', 'DgController@store')->name('dg.store');
Route::get('/dgs/{id}', 'DgController@show')->name('dg.show');
Route::get('/dgs/{id}/edit', 'DgController@edit')->name('dg.edit');
Route::put('/dgs/{id}', 'DgController@update')->name('dg.update');
Route::delete('/dgs{id}', 'DgController@delete')->name('dg.delete');



//Route::get('/home', 'HomeController@index')->name('home');#->middleware('role:admin')
//Route::resource('roles','RoleController');
//Route::post('users/attach','RoleController@attachRole')->name('users.attachrole');

