@extends('layouts.app')
@section('styles')
<style>
    html, body {
        background-color: #fff;
        color: #0098cd;
        font-family: 'Nunito', sans-serif;
        font-weight: 100;
        height: 100vh;
        margin: 0;
    }

    .full-height {
        height: 85vh;
    }

    .flex-center {
        align-items: center;
        display: flex;
        justify-content: center;
    }

    .position-ref {
        position: relative;
    }

    .code {
        border-right: 2px solid;
        font-size: 26px;
        padding: 0 15px 0 15px;
        text-align: center;
    }

    .message {
        font-size: 18px;
        text-align: center;
    }
</style>
@endsection

@section('content')
    <div class="flex-center position-ref full-height">
        <div class="code">
            Contacte al administrador         </div>

        <div class="message" style="padding: 10px;">
            Ocurrio un error en el servidor            </div>
    </div>
@endsection