@extends('layouts.app')

@section('title','Actualizar Stock')

@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css"> 
@endsection

@section('content')    
    <div class="row my-2">
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
            </select>
        </div>

    </div>

    <div class="row table-responsive my-4">
        <table id="table-supplies" class="table table-bordered">
            <caption>Lista de insumos de la categoria seleccionada</caption>
            <thead>
                <tr class="table-info">
                    <th scope="col" data-sortable="true"> Nombre </th>
                    <th scope="col"> Nro. Articulo </th>
                    <th scope="col"> Nro. de Lote </th>
                    <th scope="col"> Actual </th>
                    <th scope="col"> General </th>
                    <th scope="col"> PDP </th>
                    <th scope="col"> Decrementar </th>
                </tr>
            </thead>
            
            <tbody id="tbody-table-supplies">

            </tbody>
        </table>
    </div>
    {{-- <modal-supplie-edit-stock></modal-supplie-edit-stock>    --}}

    <div class="modal fade" id="editstocksupplie" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle" ></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h2>DETALLE</h2>
                        <div class="border-info">
                            <p class="card-text">Nro de lote:  <br>
                            Nro de articulo:  <br>
                            Nro de Referencia:  <br>
                            PDP:  <br>
                            Fecha de Vencimiento: <br>
                            <i>Ultima fecha de uso: </i></p>
                            <h2 class="card-title"> STOCK ACTUAL: </h2>
                        </div>
                        <form class="form-group">
                            <div class="col-6 mx-auto mx-3">
                                <div class="form-group input-group mb-3" width="30">
                                    <input type="number" value="1" min="0" step="1" class="form-control">                    
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-primary">decrementar</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                </div>
            </div>
        </div>
    </div>
    
    @endsection
    
    @section('script')
    <script type="text/javascript">

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
                $('#tbody-table-supplies').empty()
                $.each(supplies,function(index, value) {
                $('#table-supplies').append('<tr class="clickable-row"><td>' + 
                    value.Nombre_Insumo + '</td><td>' + 
                        value.Nro_Articulo + '</td><td>' + 
                        value.NroLote + '</td><td>' +
                        value.Stock_Actual + '</td><td>' +
                        value.Stock_Actual + '</td><td>' +
                        value.PDP + '</td><td>' +
                        '<a href="/stock/'+value.Id_Insumo+'/edit" class="btn btn-info" data-toggle="modal" data-target="#editstocksupplie">Decrementar</a>'+ '</td></tr>'                        
                        )
                })
            })
        })
    })
    $(document).ready(function() {
        $('#table-supplies').DataTable({
            "language": {
                'url' : '//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json'
                }
        });
    });
    </script>    
@endsection