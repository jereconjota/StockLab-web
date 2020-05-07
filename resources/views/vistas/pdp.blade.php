@extends('layouts.app')

@section('title','Puntos de pedido')

@section('content')    

    <div class="my-3" id="message">
    </div>

    <div class="table-responsive my-4">
        <table id="table-supplies" class="table table-bordered">
            <thead>
                <tr class="table-info">
                    <th scope="col" data-sortable="true"> Nombre </th>
                    <th scope="col"> Nro. Articulo </th>
                    <th scope="col"> Stock General </th>
                    <th scope="col"> PDP </th>
                </tr>
            </thead>
            
            <tbody id="tbody-table-supplies">
                {{-- @foreach ($pornombre as $item => $is)
                    <tr>
                        <td>{{$item}}</td>
                        @foreach ($is as $i)
                            <td>{{$i->Nro_Articulo}}</td>
                            <td>{{$i->Stock_Actual}}</td>
                            <td>{{$i->PDP}}</td>
                            @break
                        @endforeach
                    </tr>
                @endforeach --}}
                @foreach ($pdps as $item)
                    <tr>
                        <td>{{$item->Nombre_Insumo}}</td>
                        <td>{{$item->Nro_Articulo}}</td>
                        <td>{{$item->Stock_Real}}</td>
                        <td>{{$item->PDP}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
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
        tablaInsumos = $('#table-supplies').DataTable({
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