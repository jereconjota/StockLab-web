@extends('layouts.app')

@section('title','Insumo a actualizar stock')

@section('content')    
    <div class="card text-center border-info my-5">
        <div class="card-header">
            <h1>{{$supplie->Nombre_Insumo}}</h1>
            {{-- @dd($supplie) --}}
        </div>
        <div class="card-body">
            <h5 class="card-title">Stock de insumo</h5>
            <p class="card-text">info del insumo</p>
            <a href="#" class="btn btn-primary">decrementar</a>
            <a href="#" class="btn btn-dark">cancelar</a>
        </div>
        <div class="card-footer text-muted">
            <h6>Ultima vez usado</h6>
        </div>
    </div>
@endsection

@section('script')

@endsection