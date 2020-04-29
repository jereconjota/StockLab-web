<?php

Route::get('/', function () {
    return view('auth/login');
});
Route::get('/home', 'HomeController@index')->name('home');


//CONTROLADOR INSUMOS
Route::resource('stock','InsumoController')->middleware('auth');
Route::get('pdp', 'InsumoController@getPdp')->middleware('auth');

Route::get('/categoria','InsumoController@getCategorias');
Route::get('/get-supplies','InsumoController@getSupplies');
Route::post('editStock','InsumoController@store');
//FIN CONTROLADOR INSUMOS


//CONTROLADOR MOVIMIENTOS
Route::resource('movimientos','MovementsController')->middleware('auth');;

//AUTENTICACION
Auth::routes();








//////////////////////////////////////////////////////////////////////
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
Route::get('/ip','InsumoController@ip');

//Fin pruebas