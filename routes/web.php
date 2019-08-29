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

 
Auth::routes();
Route::get('/', 'BannerController@show')->name('landing');
Route::get('/home', 'HomeController@index')->name('home');//home general
Route::view('/login', 'auth.login')->name('login');
Route::post('/login', 'Auth\LoginController@login')->name("login_p");
Route::get('/logout', 'Auth\LoginController@logout')->name("logout");
Route::view('/registro', 'auth.register')->name('registro');


Route::group(['middleware'=>['check.admin.role']], function(){
//RUTAS ADMIN
Route::view('/admin/plans', 'admin/plans')->name('admin plans');

});

Route::group(['middleware'=>['check.user.role']], function(){
//RUTAS USER
Route::get('/user/rutas', 'RouteController@index')->name('user routes');
Route::get('/user/ruta/{id}', 'RouteController@show')->name('user show route');
Route::get('/user/editar/ruta/{id}','RouteController@edit')->name('user edit route');
Route::post('/user/guardar/ruta','RouteController@store')->name('user store routes');
Route::put('/user/actualizar/ruta/{id}', 'RouteController@update')->name('user update route');
Route::delete('/user/borrar/ruta/{id}','RouteController@destroy')->name('user destroy route');
Route::view('/user/opciones', 'user/options')->name('user options');



});
Route::group(['middleware'=>['check.company.role']], function(){
//RUTAS COMPANY
Route::view('/company/plan', 'company/planes')->name('company plan');
Route::view('/company/location', 'company/location')->name('company location');
Route::get('/company/banner', 'BannerController@index')->name('company banner');
Route::get('/company/banner/add', 'BannerController@create')->name('company banner add');
Route::post('/company/banner/save', 'BannerController@store')->name('company banner store');

});


Route::get('add','CarController@create');
Route::post('add','CarController@store');
Route::get('car','CarController@index');
Route::get('edit/{id}','CarController@edit');
Route::post('edit/{id}','CarController@update');
Route::delete('{id}','CarController@destroy');


