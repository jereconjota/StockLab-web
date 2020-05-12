@extends('layouts.app')

@section('title','Movimientos de insumos')

@section('content')   
  
{{-- <div class="row my-2">
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

    
</div> --}}
 
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
                {{-- @foreach ($movements as $movement)
                <tr>
                    <td scope="col" data-sortable="true">{{$movement->Nombre_Usuario}} {{$movement->Apellido_Usuario}}</td>
                    <td scope="col">{{$movement->Fecha_Movimiento}}</td>
                    <td scope="col">{{$movement->Descripcion}}</td>
                </tr>
                @endforeach --}}
            </tbody>
        </table>
    </div>
   
</div>

@endsection

@section('script')
<script type="text/javascript">
    var sucursal
    // $.getJSON('http://ip.jsontest.com/?callback=?', function(data) {
    //     console.log(data.ip)
    // });
    switch ('{{$ip}}') {
        case '201.190.238.88':
            sucursal = ' - km3'
            break;
        case '127.0.0.1':
            sucursal = ' - Rada Tilly'
            break;
        default:
            sucursal = ''
            break;
    }
    var tablaInsumos;
    tablaInsumos = $('#table-movements').DataTable({
        "ServerSide": true,
        "ajax": "{{ url('api/movimientos') }}",
        "columns": [
                    {data: 'Nombre_Usuario'},
                    {data: 'Fecha_Movimiento'},
                    {data: 'Descripcion'},
                ],
        "dom": 'Bfrtip',
        "buttons": [
            {
            extend: 'excelHtml5',
            text: 'Exportar Excel',
            title: ('Orden de Pedido interna'+ sucursal)
            },
        ],
        "language": {
            "info": "_TOTAL_ insumos",
            "search": "Buscar",
            "paginate": {
                "next": "Siguiente",
                "previous": "Anterior",
            },
            "pageLength": 20,
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