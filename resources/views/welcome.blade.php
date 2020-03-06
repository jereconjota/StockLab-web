
@extends('layouts.app')

@section('styles')
<style>
    html, body {
        background-color: #fff;
        color: #0097cd;
        /* font-family: 'Nunito', sans-serif;
        font-weight: 600; */
        height: 100vh;
        margin: 0;
    }

    .full-height {
        height: 80vh;
    }

    .flex-center {
        align-items: center;
        display: flex;
        justify-content: center;
    }

    .position-ref {
        position: relative;
    }

    .top-right {
        position: absolute;
        right: 10px;
        top: 18px;
    }

    .content {
        text-align: center;
    }

    .title {
        font-size: 84px;
    }

    .links > a {
        color: #636b6f;
        padding: 0 25px;
        font-size: 13px;
        font-weight: 600;
        letter-spacing: .1rem;
        text-decoration: none;
        text-transform: uppercase;
    }

    .m-b-md {
        margin-bottom: 30px;
    }
</style>
@endsection

@section('content')
<div class="container">
    <div class="flex-center position-ref full-height">
        <div class="content">
            <div class="title m-b-md">
                StokLab
                {{-- <img src="img/iconoStockLab.png" alt=""> --}}
            </div>

            <div class="links">
                <a href="http://stocklab-web.test/stock">Actualizar Stock</a>
                <a>Movimientos</a>
                <a>Ayuda</a>
            </div>
        </div>
    </div>
</div>
@endsection
