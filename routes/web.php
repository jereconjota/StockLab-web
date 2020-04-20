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
    return view('auth/login');
});
Route::get('/home', 'HomeController@index')->name('home');


//Pruebas
Route::get('prueba/{name}', 'PruebaController@prueba');
Route::get('/name/{name}', function($name){
    return 'Hola soy '. $name;
});
Route::get('/miPrimerRuta', function(){
    return 'Hola mundo';
});
Route::get('/dt', function () {
    $sector= StockLab\Sector::all();
    $categoria= StockLab\Categoria::all();
    return view('ejemplodatatable/datatable', compact('sector','categoria'));

});
//Fin pruebas


//CONTROLADOR INSUMOS
Route::resource('stock','InsumoController');
Route::get('/categoria','InsumoController@getCategorias');
Route::get('/get-supplies','InsumoController@getSupplies');

Route::post('editStock','InsumoController@store');
//FIN CONTROLADOR INSUMOS


//CONTROLADOR MOVIMIENTOS
Route::resource('movimientos','MovementsController');

//CONTROLADOR PDP
Route::resource('pdp', 'PdpController');

//AUTENTICACION
Auth::routes();

