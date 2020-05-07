<?php

namespace StockLab\Http\Controllers;

use StockLab\Insumo;
Use StockLab\Categoria;
use StockLab\Sector;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
            $request->user()->authorizeRoles(['admin', 'user']);
        }
        $ip = $request->ip();
        // $ip = "192.168.10.242";
        switch ($ip) {
            case "127.0.0.1":
            case "192.168.10.241":
                $sector = Sector::where([['Estado_Sector', 'Activo'],['Nombre_Sector','!=','Administracion']])->get();
                return view('vistas.index',compact('sector','ip'));    
            break;
            case "201.190.238.88":
                $sector = Sector::where([['Estado_Sector', 'Activo'],['Nombre_Sector','=','Extraccion']])
                    ->orWhere('Nombre_Sector','=','Almacen')
                    ->orWhere('Nombre_Sector','=','Hematologia')->get();
                return view('vistas.index',compact('sector','ip'));
                break;
            case "168.168.12.101":
                $sector = Sector::where([['Estado_Sector', 'Activo'],['Nombre_Sector','=','Extraccion']])
                    ->orWhere('Nombre_Sector','=','Almacen')->get();
                return view('vistas.index',compact('sector','ip'));
                break;
            default:
            return view('errors.ipincorrecta');
        }
    }
    
    public function getPdp(Request $request)
    {
        if (!empty($request->user())) {
            $request->user()->authorizeRoles(['admin', 'user']);
        }
        $ip = $request->ip();
        // $ip = "192.168.10.242";
        switch ($ip) {
            case "127.0.0.1":
            case "192.168.10.241":
                $sector = Sector::where([['Estado_Sector', 'Activo'],['Nombre_Sector','!=','Administracion']])->get();
                return view('vistas.pdp',compact('sector','ip'));    
            break;
            case "201.190.238.88":
                $sector = Sector::where([['Estado_Sector', 'Activo'],['Nombre_Sector','=','Extraccion']])
                    ->orWhere('Nombre_Sector','=','Almacen')
                    ->orWhere('Nombre_Sector','=','Hematologia')->get();
                return view('vistas.pdp',compact('sector','ip'));
                break;
            case "168.168.12.101":
                $sector = Sector::where([['Estado_Sector', 'Activo'],['Nombre_Sector','=','Extraccion']])
                    ->orWhere('Nombre_Sector','=','Almacen')->get();
                return view('vistas.pdp',compact('sector','ip'));
                break;
            default:
            return view('errors.ipincorrecta');
        }
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
        $supplie = Insumo::find($request->Id_Insumo);
        $nombreInsumo = $supplie->Nombre_Insumo;
        $nroLote = $supplie->NroLote;
        $supplie->Stock_Actual = $supplie->Stock_Actual - $request->unidades;
        if ($supplie->Stock_Actual >= 0) {
            $supplie->save();
            return response()->json(['success' => 'Valar morghuilis', 'insumo' => $nombreInsumo, 'nroLote' => $nroLote],200);
        }else {
            return response()->json(['error' => 'drakaris'],400);
        }
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
            $supplies = Insumo::where([['FK_Id_Categoria', $request->FK_Id_Categoria],['Estado_Insumo', 'Activo'],['Stock_Actual','>', 0]])->get();
            if ($supplies !== null) {
                foreach ($supplies as $sup) {
                    $arraysupplies[$sup->Id_Insumo] = $sup;
                }
                return response()->json($arraysupplies);
            }   
        }
    }


    public function apiGetInsumos(){
    // $ip = \Request::ip();
    $ip = "168.168.12.101";
    switch ($ip) {
        case "192.168.10.241":
            $sucursal = 1;
            break;
        case "201.190.238.88":
            $sucursal = 2;
            break;
        case "168.168.12.101":
            $sucursal = 3;
            break;
        case "127.0.0.1":
            $sucursal = 0;
            break;
        default:
            $sucursal = 0;
    }
    
    if ($sucursal == 0) {
        $query = Insumo::where([['Estado_Insumo', 'Activo'],['Stock_Actual','>', 0]])->get();
        }elseif ($sucursal == 1) {
            $query = Insumo::where([['Fk_Id_Sucursal','=', $sucursal],['Estado_Insumo', 'Activo'],['Stock_Actual','>', 0],])->get();
            }else {
                $query = Insumo::where([['Fk_Id_Sucursal','=', $sucursal],['Estado_Insumo', 'Activo'],['Stock_Actual','>', 0],['Fk_Id_Categoria','=','33']])
                    ->orWhere([['Fk_Id_Sucursal','=', $sucursal],['Estado_Insumo', 'Activo'],['Stock_Actual','>', 0],['Fk_Id_Categoria','=','34']])
                    ->orWhere([['Fk_Id_Sucursal','=', $sucursal],['Estado_Insumo', 'Activo'],['Stock_Actual','>', 0],['Fk_Id_Categoria','=','35']])
                    ->orWhere([['Fk_Id_Sucursal','=', $sucursal],['Estado_Insumo', 'Activo'],['Stock_Actual','>', 0],['Fk_Id_Categoria','=','35']])
                    ->orWhere([['Fk_Id_Sucursal','=', $sucursal],['Estado_Insumo', 'Activo'],['Stock_Actual','>', 0],['Fk_Id_Categoria','=','37']])
                    ->orWhere([['Fk_Id_Sucursal','=', $sucursal],['Estado_Insumo', 'Activo'],['Stock_Actual','>', 0],['Fk_Id_Categoria','=','38']])
                    ->orWhere([['Fk_Id_Sucursal','=', $sucursal],['Estado_Insumo', 'Activo'],['Stock_Actual','>', 0],['Fk_Id_Categoria','=','26']])
                    ->orWhere([['Fk_Id_Sucursal','=', $sucursal],['Estado_Insumo', 'Activo'],['Stock_Actual','>', 0],['Fk_Id_Categoria','=','27']])
                    ->orWhere([['Fk_Id_Sucursal','=', $sucursal],['Estado_Insumo', 'Activo'],['Stock_Actual','>', 0],['Fk_Id_Categoria','=','28']])->get();
        }    
        
    


    return datatables($query)
        ->addColumn('action', function($row){
            $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->Id_Insumo.'" data-original-title="Edit" class="edit btn btn-primary btn-sm editInsumo">Decrementar</a>';
            return $btn;
        })
        ->rawColumns(['action'])
        // ->make(true);
        ->toJson();
    }

    public function pdp(){
        $ins=Insumo::where([['Estado_Insumo', 'Activo'],['Fk_Id_Sucursal', 2]])->get()->groupBy('Nombre_Insumo');
        $pdps= collect([]);
        $ip = \Request::ip();
        foreach ($ins as $key => $value) {
            $stockgeneral=0;
            $insumo;
            foreach ($value as $i){
                $stockgeneral = $stockgeneral + $i->Stock_Actual;
                $insumo = $i;
            }
            if ($stockgeneral < $insumo->PDP || $stockgeneral == $insumo->PDP) {
                $insumo->Stock_Real = $stockgeneral;
                $pdps->push($insumo);
            }
        }
        return view('vistas.pdp',compact('pdps','ip'));
    }

    public function ip(){
        // $ip = Request::ip();
        $ip2 = \Request::ip();
        $ip3 = request()->ip();
        $ip4 = \Request::getClientIp(true);
        // var_dump($ip2, $ip3, $ip4);

        
        $ins=Insumo::where([['Estado_Insumo', 'Activo'],['Fk_Id_Sucursal', 2]])->get()->groupBy('Nombre_Insumo');
        $pdps= collect([]);
        // foreach ($ins as $key => $val) {
        //     // dd($key->Nombre_Insumo);
        //     if ($key->Stock_Actual < $key->PDP || $key->Stock_Actual == $key->PDP) {
        //         $pdps->push($key);
        //     }
        // }


        foreach ($ins as $key => $value) {
            $stockgeneral=0;
            $insumo;
            foreach ($value as $i){
                $stockgeneral = $stockgeneral + $i->Stock_Actual;
                $insumo = $i;
            }
            if ($stockgeneral < $insumo->PDP || $stockgeneral == $insumo->PDP) {
                $insumo->Stock_Real = $stockgeneral;
                $pdps->push($insumo);
            }
        }

        // $pornombre = $pdps->groupBy('Nombre_Insumo');



        // $ins = DB::table('insumo')
        // ->where('Fk_Id_Sucursal', 2)
        // ->where(function ($query) {
        //     $query->where('Stock_Actual','=', 'PDP')
        //           ->orWhere('Stock_Actual','<', 'PDP');
        // })
        // ->get();
        // $pornombre = $ins->groupBy('Nombre_Insumo');
        // $pornombre->toArray();

        // dd($pornombre->first()->first()->PDP);
        // dd($pdps);
        return view('vistas.pdp2',compact('pdps'));
    }
}