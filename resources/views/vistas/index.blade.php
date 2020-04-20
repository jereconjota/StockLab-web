@extends('layouts.app')

@section('title','Actualizar Stock')

@section('content')    

    <div class="my-3" id="message">
    </div>


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

    <div class="table-responsive my-4">
        <table id="table-supplies" class="table table-bordered">
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
                        <form id="formeditarinsumo" name="formeditarinsumo" class="form-horizontal">
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
        let sectorElegido
        $(document).ready(function(){
            $('#select-sectores').on('change',function(){
                sectorElegido = $(this).val();
                if ($.trim(sectorElegido) != '') {
                    $.get('categoria',{FK_Id_Sector: sectorElegido}, function(categorias) {
                        $('#select-categories').empty();
                        $('#select-categories').append('<option selected>CATEGORIA</option>');
                        $.each(categorias,function(index, value) {
                            $('#select-categories').append("<option value='"+ index +"'> "+ value +"</option>");
                        }); 
                    });
                }
            });
        });
        let chosenCategory
        $(document).ready(function(){
            $('#select-categories').on('change',function() {
                chosenCategory = $(this).val()
                $.get('get-supplies',{FK_Id_Categoria: chosenCategory},function(supplies) {
                    console.log(supplies)
                    $('#tbody-table-supplies').empty()
                        $.each(supplies,function(index, value) {
                            if (value.Stock_Actual == '0') { 
                                return true; //si el insumo no tiene stock, lo descarta
                            }
                            $('#table-supplies').append('<tr class="clickable-row"><td>' + 
                                    value.Nombre_Insumo + '</td><td>' + 
                                    value.Nro_Articulo + '</td><td>' + 
                                    value.NroLote + '</td><td>' +
                                    value.Stock_Actual + '</td><td>' +
                                    value.Stock_Actual + '</td><td>' +
                                    value.PDP + '</td><td>' +
                                    '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'+value.Id_Insumo+'" data-original-title="Edit" class="edit btn btn-primary btn-sm editInsumo">Decrementar</a>'+ '</td></tr>'   
                                    )
        
                            })  
                }).fail(function() { //Capturamos el error 500 pero hay q ver como verga hacemos para q reconozca si devuelve null el query
                    $('#message').html('<div class="alert alert-info alert-block">'+
                                        '<button type="button" class="close" data-dismiss="alert">×</button>'+	
                                        '<strong>No se encontraron insumos con stock asociados a la categoria \''+$('#select-categories').children("option:selected").text()+'\'</strong>')
                    });
            })
        })
  
    $(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        }); 
    var tablaInsumos;
    // $(document).ready(function() {
        tablaInsumos = $('#table-supplies').DataTable({
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
    // });   
    
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
            $.ajax({
                type: "POST",
                url: "editStock",
                data: {
                    'unidades': $('#unidades').val(),
                    'Id_Insumo': $('#Id_Insumo').val(),
                },
                statusCode: {
                    500: function() {
                        alert("Error en el servidor, por favor comuniquelo al administrador");
                        console.log('500 ');
                    }
                },
                success: function (data) {
                    console.log(data)
                    $('#formeditarinsumo').trigger("reset");
                    $('#editstocksupplie').modal('hide');
                    $('#select-categories').trigger("change")
                    $('#message').html('<div class="alert alert-success alert-block">'+
                                        '<button type="button" class="close" data-dismiss="alert">×</button>'+	
                                        '<strong>'+data.insumo+' actualizado correctamente</strong>')   
                },
                error: function (data) {
                    console.log('Error: '+data);
                    $('#message').html('<div class="alert alert-danger alert-block">'+
                                        '<button type="button" class="close" data-dismiss="alert">×</button>'+	
                                        '<strong>Algo anduvo mal, por favor da aviso al administrador</strong>')
                }
        });
        });   
    });

    </script>    
@endsection