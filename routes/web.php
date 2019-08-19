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
    return view('landing');
})->name('home');
//RUTAS ADMIN
Route::view('/admin', 'admin/home')->name('admin home');
Route::view('/admin/plans', 'admin/plans')->name('admin plans');
//RUTAS USER
Route::view('/user', 'user/home')->name('user home');
Route::get('/user/rutas', 'RouteController@index')->name('user routes');
Route::get('/user/ruta/{id}', 'RouteController@show')->name('user show route');
Route::post('/user/guardar/ruta','RouteController@store')->name('user store routes');
Route::delete('/user/borrar/ruta/{id}','RouteController@destroy')->name('user destroy route');
Route::view('/user/opciones', 'user/options')->name('user options');
//RUTAS COMPANY
Route::view('/company', 'company/home')->name('company home');
Route::view('/plan', 'company/planes')->name('company plan');
Route::view('/location', 'company/location')->name('company location');



Route::get('add','CarController@create');
Route::post('add','CarController@store');
Route::get('car','CarController@index');
Route::get('edit/{id}','CarController@edit');
Route::post('edit/{id}','CarController@update');
Route::delete('{id}','CarController@destroy');
