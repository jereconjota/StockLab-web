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
            
            <tbody id="tbody-table-supplies-pdp">
                @foreach ($pdps as $item)
                    @if ($item->Stock_Real == 0)
                        <tr /*class="table-danger"*/>
                            <td>{{$item->Nombre_Insumo}}</td>
                            <td>{{$item->Nro_Articulo}}</td>
                            <td>{{$item->Stock_Real}}</td>
                            <td>{{$item->PDP}}</td>
                        </tr>
                    @else
                        <tr>
                            <td>{{$item->Nombre_Insumo}}</td>
                            <td>{{$item->Nro_Articulo}}</td>
                            <td>{{$item->Stock_Real}}</td>
                            <td>{{$item->PDP}}</td>
                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
    </div>

@endsection
    
@section('script')
<script type="text/javascript">
        var sucursal
        var selected = []
        var tablaInsumos

        switch ('{{$sucursal}}') {
            case '2':
                sucursal = ' - km3'
                break;
            case '3':
                sucursal = ' - Rada Tilly'
                break;
            default:
                sucursal = ''
                break;
        }

    $(document).ready(function() {

        tablaInsumos = $('#table-supplies').DataTable({
            //seleccion multiple
            // "rowCallback": function( row, data ) {
            //         if ( $.inArray(data.DT_RowId, selected) !== -1 ) {
            //             $(row).addClass('selected');
            //         }
            //     },
            //seleccion con checkbox
            // "columnDefs": [ {
            //     orderable: false,
            //     className: 'select-checkbox',
            //     targets:   0
            // } ],
            // "select": {
            //     style:    'os',
            //     selector: 'td:first-child'
            // },
            // "order": [[ 1, 'asc' ]],
            "pageLength": 10,
            // "dom": 'Blfrtip',
            "dom":
                "<'row'<'col-sm-4'B><'col-sm-4 text-center'l><'col-sm-4'f>>" +
                "<'row'<'col-sm-12'tr>>" +
                "<'row'<'col-sm-6'i><'col-sm-6'p>>",
            "buttons": [
                {
                extend: 'excel',
                text: 'Exportar seleccion',
                title: ('Orden de Pedido interna'+ sucursal),
                exportOptions: {
                    rows: { selected: true }
                    },
                },
                {
                extend: 'excel',
                text: 'Exportar todo',
                exportOptions: {
                    modifier: { selected: null }
                    }
                }
            ],
            "select": true,
            "language": {
                "info": "_TOTAL_ Insumos",
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
                "infoFiltered": "",
                "select": {
                    rows: {
                        _: "/ %d insumos seleccionados",
                        0: "/ Haga click en una fila para seleccionarla",
                        1: "/ 1 insumo seleccionado"
                    }
                }
            }
        });
        //seleccion multiple
        //$('#tbody-table-supplies-pdp').on('click', 'tr', function () {
        //         var id = this.id;
        //         var index = $.inArray(id, selected);
        //         var row = tablaInsumos.row( this );

        //         if ( index === -1 ) {
        //             selected.push( id );
        //             row.select();
        //         } else {
        //             selected.splice( index, 1 );
        //             row.select(null);

        //         }
        //         $(this).toggleClass('selected');
        //     });
    });

    </script>    
@endsection