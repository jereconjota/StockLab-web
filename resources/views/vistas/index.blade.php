@extends('layouts.app')

@section('title','Actualizar Stock')

@section('content')    

    <div class="row my-2">
        <h1>INDEX</h1>
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
        <table id="table-supplies" 
        data-toggle="table" 
        data-pagination="true" 
        data-search="true">
        {{-- data-url="data1.json">  --}}
            <thead>
                <tr>
                    <th data-sortable="true"> Nombre </th>
                    <th> Nro. Articulo </th>
                    <th> Nro. de Lote </th>
                    <th> Actual </th>
                    <th> General </th>
                    <th> PDP </th>
                    <th> Decrementar </th>
                </tr>
            </thead>
            
            <tbody id="tbody-table-supplies">

            </tbody>
        </table>
        
    </div>
    



@endsection

@section('script')
<script>

    $(document).ready(function(){
        $('#select-sectores').on('change',function(){
            let sectorElegido = $(this).val();
            if ($.trim(sectorElegido) != '') {
                $.get('categoria',{FK_Id_Sector: sectorElegido}, function(categorias) {
                    console.log(categorias);
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
            console.log(chosenCategory)
            $.get('table-supplies',{FK_Id_Categoria: chosenCategory},function(supplies) {

                console.log(supplies)
                $('#tbody-table-supplies').empty()
                $.each(supplies,function(index, value) {
                $('#table-supplies').append('<tr class="clickable-row"><td>' + value.Nombre_Insumo + '</td><td>' + 
                            value.Nro_Articulo + '</td><td>' + 
                                    // value.Referencia + '</td><td>' +
                                            value.NroLote + '</td><td>' +
                                                    value.Stock_Actual + '</td><td>' +
                                                            value.Stock_Actual + '</td><td>' +
                                                                value.PDP + '</td><td>' +
                                                                '<a href="/stock/'+value.Id_Insumo+'/edit" class="btn btn-info">Decrementar</a>'+ '</td></tr>'
                                                                    // value.Unidad_Medida   + '</td></tr>'
                                                                     )
                })
            })
        })
    })
    

    // $('#table-supplies').on('click', '.clickable-row', function(event, row, $element) {
    //     // window.location = $(this).data("");
    //     console.log('sarasa')
    //     console.log(row)
    // });

    // var $table = $('#table-supplies')
    // $(function () {
    //     $table.on('click-row.bs.table', function (e, row, $element) {
    //     alert(JSON.stringify(row))
    //     })
    // })

        $("#table-supplies").on('click', 'click-row.bs.table', function (e, row, $element) {
            // window.location = $element.data('href');
            console.log('sarasa')
        });
</script>    
@endsection