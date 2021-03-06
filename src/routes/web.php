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

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('users','UserController');
Route::resource('roles','RoleController');
Route::post('users/attach','RoleController@attachRole')->name('users.attachrole');
Route::get('/dispatch', 'EventController@pruebadispatch')->name('event.dispatch');
Route::post('/ajaxcall', 'EventController@ajaxcall')->name('event.ajaxcall');


