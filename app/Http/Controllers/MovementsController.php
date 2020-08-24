<?php

namespace StockLab\Http\Controllers;

use Illuminate\Http\Request;
use StockLab\Movimiento;

class MovementsController extends Controller
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
        $ip = \Request::ip();
        $ip = \substr($ip,0,11);
        // $ip = "168.168.12.101";
        switch ($ip) {
            case "127.0.0.1":
            case "192.168.10.": //"192.168.10.241"
            case "201.190.237": //"201.190.237.77"
            case "168.228.143": //"168.228.143.XXX" ip dinamica 
                break;
            default:
            return view('errors.ipincorrecta');
        }

        // $movements = Movimiento::All()->sortBy('Fecha_Movimiento')->desc;
        return view('vistas.movements',compact( 'ip')); 
    }

    public function getMovimientos(Request $request){
    $ip = \Request::ip();
    $ip = "201.190.237";
    $ip = \substr($ip,0,11);
    $observacion = "observacion";

    switch ($ip) {
        case "192.168.10.":
            $sucursal = 'Diagnos';
            break;
        case "201.190.237":
            $sucursal = 'Km3';
            break;
        case "168.228.143":
            $sucursal = 'Rada Tilly';
            break;
        case "127.0.0.1":
            $sucursal = 'Diagnos';
            break;
        default:
            $sucursal = 'Diagnos';
    }
        // $query=Movimiento::All()->sortBy('Fecha_Movimiento');
        // $query=Movimiento::where('Sucursal','=', $sucursal)->orderBy('Fecha_Movimiento','DESC');
        $query=Movimiento::where('Sucursal','=', $sucursal)->get();
        foreach ($query as $key) {
            $pos = strpos($key->Descripcion, 'OBSERV');
            $sub = substr($key->Descripcion, $pos);
            $pos1 = strpos($sub, '{');
            $sub1 = substr($sub, 0, $pos1);

            $key->observacion = $sub1;
            $key->Descripcion = substr($key->Descripcion,0,$pos);
        }
        return datatables($query)->toJson();
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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
}
