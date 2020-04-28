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
                    <th scope="col"> Nro. de Lote </th>
                    <th scope="col"> Actual </th>
                    <th scope="col"> PDP </th>
                </tr>
            </thead>
            
            <tbody id="tbody-table-supplies">

            </tbody>
        </table>
    </div>

    @endsection
    
    @section('script')
    <script type="text/javascript">
        
    $(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        }); 
        var tablaInsumos;
        tablaInsumos = $('#table-supplies').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax": "{{ url('api/insumosenpdp') }}",
            "columns": [
                    {data: 'Nombre_Insumo'},
                    {data: 'Nro_Articulo'},
                    {data: 'NroLote'},
                    {data: 'Stock_Actual'},
                    {data: 'PDP'},
                ],
            "pagingType": "simple",
            // "dom": 'Bfrtip',
            // "buttons": [ 'excel', 'pdf' ],
            "language": {
                "info": "_TOTAL_ insumos",
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
            
 
    });

    </script>    
@endsection