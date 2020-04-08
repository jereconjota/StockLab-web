<template>
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
    
</template>

<script>
    export default {
        // data(){
        //     return{
        //         supplie,
        //     }
        // },
        mounted() {
            $(this).data("href")
            }
        }
    
</script>
