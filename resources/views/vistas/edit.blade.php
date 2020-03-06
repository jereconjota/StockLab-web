@extends('layouts.app')

@section('title','Insumo a actualizar stock')

@section('content')    
<form class="form-group" method="POST" action="/stock/{{$supplie->Id_Insumo}}" enctype="multipart/form-data">
    {{-- directiva de blade para utilizar un metodo que envie oculta la informacion (?) --}}
    @method('PUT')
    {{-- directiva de blade para proteger formularios  --}}
    @csrf 

   

    <div class="col-md-8 mx-auto card text-center border-info my-3">
        <div class="card-header my-2">
            <h1><b>{{$supplie->Nombre_Insumo}}</b></h1>
        </div>
        <div class="card-body">
            <h2>DETALLE</h2>
            <div class="border-info">
                <p class="card-text">Nro de lote: {{$supplie->NroLote}} <br>
                Nro de articulo: {{$supplie->Nro_Articulo}} <br>
                Nro de Referencia: {{$supplie->Referencia}} <br>
                PDP: {{$supplie->PDP}} <br>
                Fecha de Vencimiento: {{$supplie->Fecha_Vencimiento}} <br>
                <i>Ultima fecha de uso: {{$supplie->Fecha_Uso}}</i></p>
                <h2 class="card-title"> STOCK ACTUAL: {{$supplie->Stock_Actual}} ({{$supplie->Unidad_Medida}})</h2>
                {{-- <h4 class="card-title"> Unidad de medida: {{$supplie->Unidad_Medida}}</h5> --}}
            </div>
            {{-- <div>                       
                <input type="number" id="replyNumber" min="0" step="1" data-bind="value:replyNumber" />
                <a href="#" class="btn btn-primary">decrementar</a>
            </div> --}}
            <div class="col-6 mx-auto mx-3">
                <div class="input-group mb-3" width="30">
                    <input type="number" class="form-control" placeholder="Unidades utilizadas" aria-label="Unidades utilizadas" 
                    aria-describedby="basic-addon2" id="replyNumber" min="0" step="1" data-bind="value:replyNumber">
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-primary">decrementar</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer text-muted mb-2">
            {{-- <a href="javascript:history.go(-1)" class="btn btn-outline btn-dark">cancelar</a> --}}
            <a href="/stock/" class="btn btn-outline btn-default btn-dark">cancelar</a>
        </div>
    </div>

</form>
@endsection

@section('script')

@endsection