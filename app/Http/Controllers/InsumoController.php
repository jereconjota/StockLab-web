<?php

namespace StockLab\Http\Controllers;

use StockLab\Insumo;
Use StockLab\Categoria;
use StockLab\Sector;
use Illuminate\Http\Request;

class InsumoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (!empty($request->user())) {
            $request->user()->authorizeRoles(['admin']);
        }
        $ip = $request->ip();
        // if ($ip === "201.190.238.88" || $ip === "168.228.143.124") {        
        //     $sector = Sector::where([['Estado_Sector', 'Activo'],['Nombre_Sector','!=','Administracion']])->get();
        //     return view('vistas.index',compact('sector','ip'));
        // }else{
        //     return view('errors.ipincorrecta');
        // }
        $sector = Sector::where([['Estado_Sector', 'Activo'],['Nombre_Sector','!=','Administracion']])->get();
        return view('vistas.index',compact('sector','ip'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // if (!empty($request->user())) {
        //     $request->user()->authorizeRoles(['admin']);
        // }

        $supplie = Insumo::find($id);        
        return response()->json($supplie);
    }

  /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Insumo::updateOrCreate(['Id_Insumo' => $request->Id_Insumo],
        //         [ 'Stock_Actual' => $request->Stock_Actual - $request->unidades]);
        // return response()->json(['success'=>'Stock actualizado correctamente']);
        $supplie = Insumo::find($request->Id_Insumo);
        $nombreInsumo = $supplie->Nombre_Insumo;
        $supplie->Stock_Actual = $supplie->Stock_Actual - $request->unidades;
        $supplie->save();
        // return response()->json(['success'=>'anduvo']);
        return response()->json(['success' => 'Valar morghuilis', 'insumo' => $nombreInsumo],200);
        // return back()->with('success','Item created successfully!');

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $supplie = Insumo::find($id);
        $supplie->Stock_Actual = $supplie->Stock_Actual - $request->unidades;
        // $supplie->Stock_Actual = $supplie->Stock_Actual - $request->get('unidades');
        $supplie->save();
        return redirect()->route('stock.index')->with('success','Item created successfully!');

    }


    public function getCategorias(Request $request){
        if ($request->ajax()) {
            $categorias = Categoria::where([['FK_Id_Sector', $request->FK_Id_Sector],['Estado_Categoria', 'Activo']])->get();
            if (count($categorias)>0) {
                foreach ($categorias as $cat) {
                    $arraycategorias[$cat->PK_Id_Categoria] = $cat->Nombre_Categoria;
                }
                return response()->json($arraycategorias);
            }   
        }
    }
    public function getSupplies(Request $request){
        // if ($request->ajax()) {
            $supplies = Insumo::where([['FK_Id_Categoria', $request->FK_Id_Categoria],['Estado_Insumo', 'Activo']/*,['Stock_Actual','>', 0]*/])->get();
                foreach ($supplies as $sup) {
                    $arraysupplies[$sup->Id_Insumo] = $sup;
                }
                return response()->json($arraysupplies);
        // }
    }


}