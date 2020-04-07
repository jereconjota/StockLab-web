<template>
    <!-- Modal -->
    <div class="modal fade" id="editstocksupplie" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Nombre Insumo</h5>
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
                        <!-- {{-- <div>                       
                            <input type="number" id="replyNumber" min="0" step="1" data-bind="value:replyNumber" />
                            <a href="#" class="btn btn-primary">decrementar</a>
                        </div> --}} -->
                        <form class="form-group" method="POST" action="" enctype="multipart/form-data">
                            <!-- @method('PUT'){{-- directiva de blade para utilizar un metodo que envie oculta la informacion (?) --}}
                            @csrf {{-- directiva de blade para proteger formularios  --}}
                             -->
                            <div class="col-6 mx-auto mx-3">
                                <div class="form-group input-group mb-3" width="30">
                                    <!-- {{-- <input type="number" class="form-control" placeholder="Unidades utilizadas" aria-label="Unidades utilizadas" 
                                    aria-describedby="basic-addon2" id="replyNumber" min="0" step="1" data-bind="value:replyNumber" value="1" name="unidadesutilizadas">
                                    --}} -->
                                    <input type="number" name="unidades" value="1" min="0" step="1" class="form-control">                    
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-primary">decrementar</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    
</template>

<script>
    export default {
        
    }
</script>
