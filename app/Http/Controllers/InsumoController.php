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
    public function index()
    {
        $sector = Sector::where([['Estado_Sector', 'Activo'],['Nombre_Sector','!=','Administracion']])->get();
        // $supplies = Insumo::where([['Estado_Insumo', 'Activo'],['Stock_Actual','>', 0]])->get();
        $supplies = Insumo::paginate(15);
        return view('vistas.index',compact('sector'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $insumo = new Insumo();

        $insumo->Nombre_Insumo = $request->Nombre_Insumo;
        $insumo->NroLote = $request->NroLote;
        $insumo->Nro_Articulo = $request->Nro_Articulo;
        $insumo->Referencia = $request->Referencia;
        $insumo->Fecha_Vencimiento = $request->Fecha_Vencimiento;
        $insumo->Ubicacion = $request->Ubicacion;
        $insumo->Temperatura = $request->Temperatura;
        $insumo->Precio_Insumo = $request->Precio_Insumo;
        $insumo->Fecha_Uso = $request->Fecha_Uso;
        $insumo->Unidad_Medida = $request->Unidad_Medida;
        $insumo->Estado_Insumo = $request->Estado_Insumo;
        $insumo->PDP = $request->PDP;
        $insumo->Stock_Actual = $request->Stock_Actual;
        // $insumo->Stock_Real = $request->Stock_Real;
        $insumo->Fecha_Ingreso = $request->Fecha_Ingreso;
        $insumo->Fecha_Baja = $request->Fecha_Baja;

        $insumo-> save();
        return Saved;

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

    public function show(Insumo $supplie)
    {
        // $supplie = Insumo::find($id);
        return view('vistas.show',compact('supplie'));
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
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
    public function update(Request $request, $id)
    {
        $supplie = Insumo::find($id);
        $supplie->Stock_Actual = $supplie->Stock_Actual - $request->unidades;
        // $supplie->Stock_Actual = $supplie->Stock_Actual - $request->get('unidades');
        $supplie->save();
        return redirect()->route('stock.index')->with('success','Item created successfully!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
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