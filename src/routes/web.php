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
Route::get('/dispatch', 'EventController@pruebadispatch')->name('event.dispatch');
Route::post('/ajaxcall', 'EventController@ajaxcall')->name('event.ajaxcall');


