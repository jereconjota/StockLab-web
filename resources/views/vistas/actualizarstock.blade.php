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
            <table id="table-supplies" data-toggle="table" data-pagination="true" data-search="true"> {{--data-url="data1.json" --}}
                <thead>
                    <tr>
                        <th data-sortable="true"> Nombre </th>
                        <th> Nro. Articulo </th>
                        <th> Referencia </th>
                        <th> Nro. de Lote </th>
                        <th> Actual </th>
                        <th> General </th>
                        <th> PDP </th>
                        <th> Unidad de medida </th>
                        <th> Ultima fecha de uso </th>
                        <th> Fecha de vencimiento </th>
                    </tr>
                </thead>
                
                <tbody id="tbody-table-supplies">
                    <tr>
                    <td>1</td>
                    <td>Item 1</td>
                    <td>$1</td>
                    </tr>

                    <tr>
                    <td>2</td>
                    <td>Item 2</td>
                    <td>$2</td>
                    </tr>
                
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
        $('#table-supplies').on('change',function() {
            let categoriaElegida = $(this).val();
            if ($.trim(sectorElegido) != '') {
                $.get('insumo',{FK_Id_Cagoria: categoriaElegida},function(insumos) {
                    console.log(insumos);
                    $('#tbody-table-supplies').empty();
                    $('#tbody-table-supplies').append('<option selected>CATEGORIA</option>');
                    $.each(categorias,function(index, value) {
                    $('#tbody-table-supplies').append("<option value='"+ index +"'> "+ value +"</option>");
                })
            }
        })
    })

</script>    
@endsection