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

//Carga la tabla en Actualizar Stock
Route::get('insumos', function(){
    //////////////////////////////////////////////////////////////////////////////////////
    // HAY Q CAMBIAR PARA Q LA LOGICA LA MANEJE EL CONTROLADOR Y SOLO QUEDE EN LA RUTA //
    ////////////////////////////////////////////////////////////////////////////////////
    
    $ip = \Request::ip();
    $sucursal=0;
    switch ($ip) {
        case "192.168.10.241":
            $sucursal = 1;
            break;
        case "201.190.238.88":
            $sucursal = 2;
            break;
        case "168.228.143.124":
            $sucursal = 3;
            break;
        case "127.0.0.1":
            $sucursal = 1;
            break;
        default:
            $sucursal = 0;
    }

    // if ($sucursal = 0) {
    //     # code...
    // } else {
    //     # code...
    // }
    
    $query = Insumo::where([['Fk_Id_Sucursal','=', $sucursal],['Estado_Insumo', 'Activo'],['Stock_Actual','>', 0],['Fk_Id_Categoria','=','33']])
        ->orWhere([['Fk_Id_Sucursal','=', $sucursal],['Estado_Insumo', 'Activo'],['Stock_Actual','>', 0],['Fk_Id_Categoria','=','34']])
        ->orWhere([['Fk_Id_Sucursal','=', $sucursal],['Estado_Insumo', 'Activo'],['Stock_Actual','>', 0],['Fk_Id_Categoria','=','35']])
        ->orWhere([['Fk_Id_Sucursal','=', $sucursal],['Estado_Insumo', 'Activo'],['Stock_Actual','>', 0],['Fk_Id_Categoria','=','35']])
        ->orWhere([['Fk_Id_Sucursal','=', $sucursal],['Estado_Insumo', 'Activo'],['Stock_Actual','>', 0],['Fk_Id_Categoria','=','37']])
        ->orWhere([['Fk_Id_Sucursal','=', $sucursal],['Estado_Insumo', 'Activo'],['Stock_Actual','>', 0],['Fk_Id_Categoria','=','38']])
        ->orWhere([['Fk_Id_Sucursal','=', $sucursal],['Estado_Insumo', 'Activo'],['Stock_Actual','>', 0],['Fk_Id_Categoria','=','44']])->get();


    return datatables($query)
        ->addColumn('action', function($row){
            $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->Id_Insumo.'" data-original-title="Edit" class="edit btn btn-primary btn-sm editInsumo">Decrementar</a>';
            return $btn;
        })
        ->rawColumns(['action'])
        ->toJson();
});



//Carga la tabla en Punto de Pedido
Route::get('insumosenpdp', function(){
    $query = Insumo::where([/*['FK_Id_Categoria', $request->FK_Id_Categoria],*/['Estado_Insumo', 'Activo'],['Stock_Actual','<=', 'PDP']])->get();
    return datatables($query)
        ->toJson();
});



