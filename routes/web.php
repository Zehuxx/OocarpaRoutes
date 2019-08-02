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
    return view('layouts/admin');
});

Route::get('/app', function () {
    return view('layouts/app');
});


Route::view('/admin', 'admin/home');
Route::view('/basic', 'basic');
Route::view('/welcome', 'welcome');