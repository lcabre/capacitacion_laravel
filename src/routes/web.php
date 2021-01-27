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

//PERFILES
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
Route::put('/perfil/{id}', 'ProyectosController@update')->name('proyectos.update');
Route::delete('/perfil/{id}', 'ProyectosController@delete')->name('proyectos.delete');




//Route::get('/home', 'HomeController@index')->name('home');#->middleware('role:admin')
//Route::resource('roles','RoleController');
//Route::post('users/attach','RoleController@attachRole')->name('users.attachrole');

