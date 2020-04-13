@extends('layouts.app')

@section('title','Movimientos de insumos')

@section('content')   
  
<div class="row my-2">
    <div class="col-md-3">
        <select name="sectors" id="select-sectores" class="browser-default custom-select">
            <option>Filtrar por...</option>
        </select>
    </div>

    <div class="col-md-3">
        <select name="categories" id="select-categories" class="browser-default custom-select">
            <option>Sucursal</option>
        </select>
    </div>

    
</div>
 
<div class="row my-2">
    <div class="row table-responsive">
        <table id="table-supplies" class="table table-bordered" data-sort-name="date" data-sort-order="desc">
            <caption>Movimientos sobre insumos</caption>
            <thead>
                <tr class="table-info">
                    <th scope="col" data-sortable="true"> Nombre </th>
                    <th scope="col" data-field="date"> Descripcion </th>
                    <th scope="col"> Descripcion </th>
                </tr>
            </thead>
            <tbody id="tbody-table-supplies">
                @foreach ($movements as $movement)
                <tr>
                    <td scope="col" data-sortable="true">{{$movement->Nombre_Usuario}} {{$movement->Apellido_Usuario}}</td>
                    <td scope="col">{{$movement->Fecha_Movimiento}}</td>
                    <td scope="col">{{$movement->Descripcion}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <span>{{$movements->links()}}</span>
    </div>
   
</div>

@endsection

@section('script')

@endsection