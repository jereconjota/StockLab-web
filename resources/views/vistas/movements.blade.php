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
        <table id="table-movements" class="table table-bordered" data-sort-name="date" data-sort-order="desc">
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
    </div>
   
</div>

@endsection

@section('script')
<script type="text/javascript">
var tablaMovimientos;
    tablaMovimientos = $('#table-movements').DataTable({
        "pagingType": "simple",
            "language": {
                "info": "_TOTAL_ movimientos",
                            "search": "Buscar",
                            "paginate": {
                                "next": "Siguiente",
                                "previous": "Anterior",
                            },
                            "lengthMenu": 'Mostrar <select>'+
                                            '<option value="10">10</value>'+
                                            '<option value="20">20</value>'+
                                            '<option value="30">30</value>'+
                                            '<option value="-1">Todos</value>'+
                                            '</select> registros',
                            "loadingRecords": "Cargando...",
                            "processing": "Procesando...",
                            "emptyTable": "No hay datos",
                            "zeroRecords": "No hay concidencias",
                            "infoEmpty": "",
                            "infoFiltered": ""
            }
        });
</script>
@endsection