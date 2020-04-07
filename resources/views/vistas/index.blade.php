@extends('layouts.app')

@section('title','Actualizar Stock')

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

    <div class="row table-responsive">
        {{-- <table id="table-supplies" 
        data-toggle="table" 
        data-pagination="true" 
        data-search="true"> --}}
        {{-- data-url="data1.json">  --}}
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
    <modal-supplie-edit-stock></modal-supplie-edit-stock>   
    @include('edit')

  

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
    let insumo_seleccionado
    $(document).ready(function(){
        $('#select-categories').on('change',function() {
            let chosenCategory = $(this).val()
            // console.log(chosenCategory)
            $.get('table-supplies',{FK_Id_Categoria: chosenCategory},function(supplies) {

                // console.log(supplies)
                $('#tbody-table-supplies').empty()
                $.each(supplies,function(index, value) {
                $('#table-supplies').append('<tr class="clickable-row"><td>' + value.Nombre_Insumo + '</td><td>' + 
                            value.Nro_Articulo + '</td><td>' + 
                                    // value.Referencia + '</td><td>' +
                                            value.NroLote + '</td><td>' +
                                                    value.Stock_Actual + '</td><td>' +
                                                            value.Stock_Actual + '</td><td>' +
                                                                value.PDP + '</td><td>' +
                                                                '<a href="/stock/'+value.Id_Insumo+'/edit" class="btn btn-info" data-toggle="modal" data-target="#editstocksupplie">Decrementar</a>'+ '</td></tr>'
                                                                // '<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editstocksupplie">Decrementar</button>'+ '</td></tr>'
                                                                    // value.Unidad_Medida   + '</td></tr>'
                                                                     )
                })
            })
        })
    })
    
    // $(document).ready(function($) {
    //     $("#table-supplies").click(function() {
    //         // window.document.location = $(this).data("href");
    //         // console.log($(this).data())
    //         $('#editstocksupplie').modal('show')

    //     });
    // });
</script>    
@endsection