@extends('layouts.app')

@section('title','Insumo a actualizar stock')

@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css"> 
@endsection
        
@section('content')  
    <div class="row my-3">
        <div class="col-md-3">
            <select name="sectors" id="select-sectores" class="browser-default custom-select">
                <option selected>SECTOR</option>
                @foreach ($sector as $sec)
                    <option value="{{ $sec->Id_Sector }}">{{ $sec->Nombre_Sector }}</option>
                @endforeach
            </select>
        </div>

        <div class="col-md-3">
            <select name="categories" id="select-categories" class="browser-default custom-select">
                <option selected disabled>CATEGORIAS</option>
                {{-- @foreach ($categoria as $cat)
                    <option value="{{ $cat->PK_Id_Categoria }}">{{ $cat->Nombre_Categoria }}</option>
                @endforeach --}}
            </select>
        </div>
    </div>

    <div class="container my-5">
        <div class="row table-responsive">
            <table id="tablainsumos" class="table table-bordered">
                <thead>
                    <tr>
                        <th> Nombre </th>
                        <th> Nro. Articulo </th>
                        <th> Nro. de Lote </th>
                        <th> Actual </th>
                        <th> PDP </th>
                        <th>&nbsp;</th>
                        {{-- <th scope="col"> Decrementar </th> --}}
                    </tr>
                </thead>
                
                {{-- <tbody id="tbody-table-supplies">
                    @foreach ($insumos as $insumo)
                    <tr>
                        <td>{{$insumo->Nombre_Insumo}}</td>
                        <td>{{$insumo->Nro_Articulo}}</td>
                        <td>{{$insumo->NroLote}}</td>
                        <td>{{$insumo->Stock_Actual}}</td>
                        <td>{{$insumo->PDP}}</td>
                    </tr>      
                    @endforeach
                </tbody> --}}
            </table>
        </div>
    </div>
       
@endsection

@section('script')

    <script>
        $(document).ready(function() {
            $('#tablainsumos').DataTable({
                "ServerSide": true,
                "ajax": "{{ url('api/insumos') }}",
                "columns": [
                    {data: 'Nombre_Insumo'},
                    {data: 'Nro_Articulo'},
                    {data: 'NroLote'},
                    {data: 'Stock_Actual'},
                    {data: 'PDP'},
                    {data: 'btn'},
                ],
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
        $(document).ready(function(){
        $('#select-sectores').on('change',function(){
            let sectorElegido = $(this).val();
            if ($.trim(sectorElegido) != '') {
                $.get('categoria',{FK_Id_Sector: sectorElegido}, function(categorias) {
                    // console.log(categorias);
                    $('#select-categories').empty();
                    $('#select-categories').append('<option selected>CATEGORIA</option>');
                    $.each(categorias,function(index, value) {
                        $('#select-categories').append("<option value='"+ index +"'> "+ value +"</option>");
                    }); 
                });
            }
        });
    });
    $(document).ready(function(){
        $('#select-categories').on('change',function() {
            let chosenCategory = $(this).val()
            $.get('table-supplies',{FK_Id_Categoria: chosenCategory},function(supplies) {
                // $('#tbody-table-supplies').empty()
                // $.each(supplies,function(index, value) {
                // $('#table-supplies').append('<tr class="clickable-row"><td>' + 
                //     value.Nombre_Insumo + '</td><td>' + 
                //         value.Nro_Articulo + '</td><td>' + 
                //         value.NroLote + '</td><td>' +
                //         value.Stock_Actual + '</td><td>' +
                //         value.Stock_Actual + '</td><td>' +
                //         value.PDP + '</td><td>' +
                //         '<a href="/stock/'+value.Id_Insumo+'/edit" class="btn btn-info" data-toggle="modal" data-target="#editstocksupplie">Decrementar</a>'+ '</td></tr>'                        
                //         )
                // })
            })
        })
    })
    </script>
@endsection