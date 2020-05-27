<?php

use Illuminate\Http\Request;
use StockLab\Insumo;
use StockLab\Movimiento;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('insumosdt', function(){
    // return StockLab\Insumo::all();
    return datatables()
        ->eloquent(StockLab\Insumo::query())
        ->addColumn('btn', 'ejemplodatatable/actions')
        ->rawColumns(['btn'])
        ->toJson();
});

//Carga la tabla en Actualizar Stock
Route::get('insumos/','InsumoController@apiGetInsumos');


//Carga la tabla en Punto de Pedido
Route::get('insumosenpdp', function(){
    $query = Insumo::where([/*['FK_Id_Categoria', $request->FK_Id_Categoria],*/['Estado_Insumo', 'Activo'],['Stock_Actual','<=', 'PDP']])->get();

    return datatables($query)
        ->toJson();
});

Route::get('getMovimientos', 'MovementsController@getMovimientos');




Route::get('movimientos', function(){
    // return StockLab\Insumo::all();
    return datatables()
        ->eloquent(StockLab\Movimiento::query())
        ->toJson();
});
