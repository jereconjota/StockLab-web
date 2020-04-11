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
        $sector = Sector::where([['Estado_Sector', 'Activo'],['Nombre_Sector','!=','Administracion']])->get();
        // $supplies = Insumo::where([['Estado_Insumo', 'Activo'],['Stock_Actual','>', 0]])->get();
        // $supplies = Insumo::paginate(15);
        return view('vistas.index',compact('sector','ip'));
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    // public function show(Insumo $supplie)
    // {
    //     // var_dump($supplie);
    //     return view('vistas.show',compact('supplie'));
    // }

    // public function show(Insumo $supplie, Request $request)
    // {
    //     if (!empty($request->user())) {
    //         $request->user()->authorizeRoles(['admin']);
    //     }
    //     // $supplie = Insumo::find($id);
    //     return view('vistas.show',compact('supplie'));
       
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, Request $request)
    {
        if (!empty($request->user())) {
            $request->user()->authorizeRoles(['admin']);
        }

        $supplie = Insumo::find($id);        
        return view('vistas.edit',compact('supplie'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
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
        if ($request->ajax()) {
            $supplies = Insumo::where([['FK_Id_Categoria', $request->FK_Id_Categoria],['Estado_Insumo', 'Activo'],['Stock_Actual','>', 0]])->paginate(10);
            // var_dump($supplies);
            foreach ($supplies as $sup) {
                $arraysupplies[$sup->Id_Insumo] = $sup;
            }
            return response()->json($arraysupplies);
            
        }
    }

}