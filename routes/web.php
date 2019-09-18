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
Route::get('/', 'Landing\LandingController@index')->name('landing');
Route::get('/home', 'HomeController@index')->name('home');//home general
Route::view('/login', 'auth.login')->name('login');
Route::post('/login', 'Auth\LoginController@login')->name("login_p");
Route::get('/logout', 'Auth\LoginController@logout')->name("logout");
Route::view('/registro', 'auth.register')->name('registro');


Route::group(['middleware'=>['check.admin.role']], function(){
//------------------------ ADMIN -----------------------------------
//Route::view('/admin/plans', 'admin/plans')->name('admin plans');
Route::get('/admin/users', 'Admin\UserController@index')->name('users');

//Rutas CRUD de planes
Route::get('/admin/plans', 'Admin\PlanController@index')->name('plans');
Route::get('/admin/plans/add', 'Admin\PlanController@create')->name('add plan');
Route::post('/admin/plans/create', 'Admin\PlanController@store')->name('create plan');
Route::delete('admin/plans/delete/{id}', 'Admin\PlanController@destroy')->name('destroy plan');

//Rutas CRUD de routeTypes
Route::get('/admin/routeTypes', 'Admin\RouteTypeController@index')->name('route Types');
Route::get('/admin/routeTypes/add', 'Admin\RouteTypeController@create')->name('add route Types');
Route::post('/admin/routeTypes/create', 'Admin\RouteTypeController@store')->name('create route Types');
Route::Delete('/admin/routeTypes/delete/{id}', 'Admin\RouteTypeController@destroy')->name('destroy route Types');


//Rutas CRUD de roles
Route::get('/admin/roles', 'Admin\RoleController@index')->name('roles');
Route::get('/admin/roles/add', 'Admin\RoleController@create')->name('add role');
Route::post('/admin/roles/create', 'Admin\RoleController@store')->name('create role');
Route::Delete('/admin/roles/delete/{id}', 'Admin\RoleController@destroy')->name('destroy role');


// Rutas CRUD de empresas
Route::get('/admin/companies', 'Admin\CompanyController@index')->name('companies');
Route::Delete('/admin/company/delete/{id}', 'Admin\CompanyController@destroy')->name('destroy company');


//Rutas CRUD de rutas
Route::get('/admin/routes', 'Admin\RouteController@index')->name('routes');
Route::Delete('/admin/routes/delete/{id}', 'Admin\RouteController@destroy')->name('destroy route');

// --------------------------- FIN ADMIN ----------------------------------------
});

Route::group(['middleware'=>['check.user.role']], function(){
//RUTAS USER
Route::get('/user/rutas', 'User\RouteController@index')->name('user routes');
Route::get('/user/ruta/{id}', 'User\RouteController@show')->name('user show route');
Route::get('/user/editar/ruta/{id}','User\RouteController@edit')->name('user edit route');
Route::post('/user/guardar/ruta','User\RouteController@store')->name('user store routes');
Route::put('/user/actualizar/ruta/{id}', 'User\RouteController@update')->name('user update route');
Route::delete('/user/borrar/ruta/{id}','User\RouteController@destroy')->name('user destroy route');
Route::view('/user/opciones', 'user/options')->name('user options');



});
Route::group(['middleware'=>['check.company.role']], function(){
//RUTAS COMPANY
//Route::get('/company/plan', 'Company\PlanController@index')->name('company plan');
    Route::get('/company/plan', 'Company\PlanController@index')->name('company plan');
    Route::get ('/company/plan/buy/{id}', 'Company\PlanController@buyPlan')->name('company plan buy');

    Route::view('/company/location', 'company/location')->name('company location');
    Route::get('/company/banner', 'Company\BannerController@index')->name('company banner');
    Route::get('/company/banner/add', 'Company\BannerController@create')->name('company banner add');
    Route::post('/company/banner/save', 'Company\BannerController@store')->name('company banner store');
    Route::delete('/company/banner/delete/{id}', 'Company\BannerController@destroy')->name('company banner delete');

});


Route::get('add','CarController@create');
Route::post('add','CarController@store');
Route::get('car','CarController@index');
Route::get('edit/{id}','CarController@edit');
Route::post('edit/{id}','CarController@update');
Route::delete('{id}','CarController@destroy');


