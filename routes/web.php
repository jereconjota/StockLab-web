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
    return view('welcome');
});


Route::get('prueba/{name}', 'PruebaController@prueba');

Route::get('/name/{name}', function($name){
    return 'Hola soy '. $name;
});

Route::get('/miPrimerRuta', function(){
    return 'Hola mundo';
});


Route::resource('stock','InsumoController');

Route::get('/actualizar-stock','InsumoController@index');
Route::get('/categoria','InsumoController@getCategorias');
Route::get('/table-supplies','InsumoController@getSupplies');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('component', 'forComponents');