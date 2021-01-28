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

Route::get('/home', 'HomeController@index')->name('home')->middleware('role:admin');
Route::resource('users','UserController');
//Route::get('users','UserController@index');
Route::put('users/attach','UserController@attachProject')->name('users.attachproject');
Route::resource('roles','RoleController');
Route::resource('projects','ProjectController');
Route::put('projects/test','ProjectController@testrole')->name('projects.testrole');
//Route::post('users/attach','RoleController@attachRole')->name('users.attachrole');
//Route::post('projects/attach','ProjectController@attachProject')->name('users.attachproject')->middleware('role:admin');

// los names de las rutas quedan cacheados?

