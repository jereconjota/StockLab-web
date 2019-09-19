@extends('layouts.app')

@section('title','Actualizar Stock')

@section('content')    

    <div class="row my-2">
        <div class="col-md-3">
            <select name="sectores" id="select-sectores" class="browser-default custom-select">
                <option selected>SECTOR</option>
                @foreach ($sector as $sec)
                <option value="{{ $sec->Id_Sector }}">{{ $sec->Nombre_Sector }}</option>
                @endforeach
            </select>
        </div>
    </div>


    <div class="row">
        <div class="col-md-3">
            <div class="list-group" id="list-categorias">
                <button type="button" class="list-group-item list-group-item-action" disabled>CATEGORIAS</button>
            </div>
        </div>

        <div class="col-md-9"></div>
    </div>

@endsection

@section('script')
<script>
    $(document).ready(function(){
        $('#select-sectores').on('change',function(){
            var sectorElegido = $(this).val();
            if ($.trim(sectorElegido) != '') {
                $.get('categoria',{FK_Id_Sector: sectorElegido}, function(categorias) {
                    console.log(categorias);
                    $('#list-categorias').empty();
                    $('#list-categorias').append('<button type="button" class="list-group-item list-group-item-action" disabled>CATEGORIAS</button>');
                    $.each(categorias,function(index, value) {
                    $('#list-categorias').append("<button type=\"button\" class=\"list-group-item list-group-item-action\">"+ value +"</button>");
                    }); 
                });
            }
        });
    });
</script>    
@endsection