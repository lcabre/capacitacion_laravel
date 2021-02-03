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
Route::resource('home', 'HomeController')->only(['index']);
Route::resource('users', 'UserController')->only(['update', 'edit']);
Route::resource('proyects', 'ProyectController');
Route::resource('dgs', 'DgController');
Route::resource('profiles', 'ProfileController')->except(['destroy', 'create', 'store']);
//Route::get('/perfiles', 'PerfilController@index')->name('perfil.index');
//Route::get('/perfil/create','PerfilController@create')->name('perfil.create');
//Route::post('/perfil', 'PerfilController@store')->name('perfil.store');
//Route::get('/perfil/{id}', 'PerfilController@show')->name('perfil.show');
//Route::get('/perfil/{id}/edit', 'PerfilController@edit')->name('perfil.edit');
//Route::put('/perfil/{id}','PerfilController@update')->name('perfil.update');








//Route::get('/home', 'HomeController@index')->name('home')->middleware('role:admin');
//Route::resource('roles','RoleController');
//Route::post('users/attach','RoleController@attachRole')->name('users.attachrole');

