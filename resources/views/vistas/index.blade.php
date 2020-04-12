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

    <div class="modal fade" id="editstocksupplie" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header center-text">
                    <h1 class="modal-title" id="modelHeading"></h1>
                    <h5 class="modal-title" id="exampleModalLongTitle" ></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                        <div class="border-info text-center">
                            Nro de lote<h3 id="nrolote"></h3>
                            Nro de articulo<h3 id="nroarticulo"></h3>
                            PDP<h3 id="pdp"></h3>
                            Ultima fecha de uso:<h5 id="ultimafechadeuso"></h5>
                            <h3>STOCK ACTUAL</h3> <h3 id="stockactual"></h3>
                        </div>
                        {{-- <form id="formeditarinsumo" name="formeditarinsumo" class="form-horizontal">
                            <div class="col-6 mx-auto mx-3">
                                <div class="form-group input-group mb-3" width="30">
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-primary" id="editBtn" value="create">Decrementar</button>
                                    </div>
                                </div>
                            </div>
                        </form> --}}
                        <form id="formeditarinsumo" name="formeditarinsumo" class="form-horizontal">
                            {{-- @csrf --}}
                            <input type="hidden" name="Id_Insumo" id="Id_Insumo">
                             
                            <div class="form-group">
                                 <label for="name" class="col-sm-2 control-label">decrementar</label>
                                 <div class="col-sm-12">
                                    <input type="number" id="unidades" value="1" min="0" step="1" class="form-control">                    
                                 </div>
                             </div>
         
                             <div class="input-group-append">
                                <button type="submit" class="btn btn-primary" id="editBtn" value="create">Decrementar</button>
                            </div>
                         </form>
                </div>
            </div>
        </div>
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
    $(document).ready(function() {
        var tablaInsumos = $('#table-supplies').DataTable({
            "language": {
                // 'url' : '//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json'
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
                    $('#tbody-table-supplies').empty()
                    $.each(supplies,function(index, value) {
                    $('#table-supplies').append('<tr class="clickable-row"><td>' + 
                        value.Nombre_Insumo + '</td><td>' + 
                            value.Nro_Articulo + '</td><td>' + 
                            value.NroLote + '</td><td>' +
                            value.Stock_Actual + '</td><td>' +
                            value.Stock_Actual + '</td><td>' +
                            value.PDP + '</td><td>' +
                            // '<a href="/stock/'+value.Id_Insumo+'/edit" class="btn btn-info editInsumo" data-toggle="modal" data-target="#editstocksupplie">Decrementar</a>'+ '</td></tr>'                        
                            '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'+value.Id_Insumo+'" data-original-title="Edit" class="edit btn btn-primary btn-sm editInsumo">Decrementar</a>'+ '</td></tr>'   
                            )

                    })
                })
            })
        })

  
            
    
    $('body').on('click', '.editInsumo', function () {
            var Id_Insumo = $(this).data('id');
            $.get("{{ route('stock.index') }}" +'/' + Id_Insumo +'/edit', function (data) {
                $('#editBtn').val("edit-book");
                $('#modelHeading').html(data.Nombre_Insumo);
                $('#editstocksupplie').modal('show');
                $('#nrolote').text(data.NroLote);
                $('#nroarticulo').text(data.Nro_Articulo);
                $('#pdp').text(data.PDP);
                $('#ultimafechadeuso').text(data.Fecha_Uso);
                $('#stockactual').text(data.Stock_Actual);
                $('#Id_Insumo').val(data.Id_Insumo);
        })
    })  

        $('#editBtn').click(function (e) {
            e.preventDefault();
            $(this).html('Save');
            console.log($('#formeditarinsumo').serialize())
            $.ajax({
                // data: $('#formeditarinsumo').serialize(),
                url: "{{ route('stock.store') }}",
                type: "POST",
                // dataType: 'json',
                success: function (data) {
                    $('#formeditarinsumo').trigger("reset");
                    $('#editstocksupplie').modal('hide');
                    tablaInsumos.draw();
                },
                error: function (data) {
                    console.log('Error: '+data);
                
                }
        });
        });    
    });


    </script>    
@endsection