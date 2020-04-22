<?php

use Illuminate\Http\Request;
use StockLab\Insumo;
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

Route::get('insumos', function(){
    $query = Insumo::where([/*['FK_Id_Categoria', $request->FK_Id_Categoria],*/['Estado_Insumo', 'Activo'],['Stock_Actual','>', 0]])->get();
    return datatables($query)
        ->addColumn('action', function($row){
            $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->Id_Insumo.'" data-original-title="Edit" class="edit btn btn-primary btn-sm editInsumo">Decrementar</a>';
            return $btn;
        })
        ->rawColumns(['action'])
        ->toJson();
});

Route::get('insumosenpdp', function(){
    $query = Insumo::where([/*['FK_Id_Categoria', $request->FK_Id_Categoria],*/['Estado_Insumo', 'Activo'],['Stock_Actual','<=', 'PDP']])->get();
    return datatables($query)
        ->toJson();
});



