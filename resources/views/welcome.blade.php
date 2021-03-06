
@extends('layouts.app')
@section('title','Inicio')


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
    .links > a:hover {
        color: #0097cd;
    }

    .m-b-md {
        margin-bottom: 30px;
    }
    .modal{
        
    }
</style>
@endsection

@section('content')
<div class="container">
    <div class="flex-center position-ref full-height">
        <div class="content">
            <div class="title m-b-md">
                StockLab
                {{-- <img src="img/iconoStockLab.png" alt=""> --}}
                @switch($ip)
                    @case("201.190.238")
                        <h4>Sede Km3</h4>
                        @break

                    @case("168.228.142")
                        <h4>Sede Rada Tilly</h4>
                        @break

                    @case("192.168.10.")
                        <h4>Sede Central</h4>
                        @break

                    @case("127.0.0.1")
                        <h4>Testing</h4>
                        @break

                    @default
                        <h4>{{$ip}}</h4>
                @endswitch
                {{-- @switch($sucursal)
                @case(2)
                    <h4>Km3</h4>
                    @break

                @case(3)
                    <h4>Rada Tilly</h4>
                    @break

                @case(1)
                    <h4>Sede Central</h4>
                    @break

                @case(0)
                    <h4>Testing</h4>
                    @break

                @default
                    <h4>{{$ip}}</h4>
            @endswitch --}}

            </div>

            <div class="links">
                @switch($ip)
                    @case("201.190.237")
                        <a href="http://stock.diagnoslab.com.ar:3333/stock">Actualizar Stock</a>
                        <a href="http://stock.diagnoslab.com.ar:3333/pdp">Ver PDP</a>
                        <a href="http://stock.diagnoslab.com.ar:3333/movimientos">Movimientos</a>
                        <a href="#" data-toggle="modal" data-target="#about">Ayuda</a>
                        @break

                    @case("168.228.142")
                        <a href="http://stock.diagnoslab.com.ar:3333/stock">Actualizar Stock</a>
                        <a href="http://stock.diagnoslab.com.ar:3333/pdp">Ver PDP</a>
                        <a href="http://stock.diagnoslab.com.ar:3333/movimientos" class="btn disabled" >Movimientos</a>
                        <a href="#" data-toggle="modal" data-target="#about">Ayuda</a>
                        @break

                    @case("192.168.10.")
                        <a href="http://192.168.10.241:3333/stock">Actualizar Stock</a>
                        <a href="http://192.168.10.241:3333/pdp">Ver PDP</a>
                        <a href="http://192.168.10.241:3333/movimientos" class="btn disabled">Movimientos</a>
                        <a href="#" data-toggle="modal" data-target="#about">Ayuda</a>
                        @break

                    @case("127.0.0.1")
                        <a href="http://stocklab-web.test/stock">Actualizar Stock</a>
                        <a href="http://stocklab-web.test/pdp">Ver PDP</a>
                        <a href="http://stocklab-web.test/movimientos" class="btn">Movimientos</a>
                        <a href="#" data-toggle="modal" data-target="#about">Ayuda</a>
                        @break

                    @default
                    <a href="http://192.168.10.241:3333/stock">Actualizar Stock</a>
                    <a href="http://192.168.10.241:3333/pdp">Ver PDP</a>
                    <a href="http://192.168.10.241:3333/movimientos" class="btn disabled">Movimientos</a>
                    <a href="#" data-toggle="modal" data-target="#about">Ayuda</a>
                    @break
                @endswitch
                {{-- @switch($sucursal)
                    @case(2)
                        @if ($ip == "127.0.0.1") {{-- si esta en testing -}}
                            <a href="http://stocklab-web.test/stock">Actualizar Stock</a>
                            <a href="http://stocklab-web.test/pdp">Ver PDP</a>
                            <a href="http://stocklab-web.test/movimientos" class="btn disabled">Movimientos</a>
                            <a href="#" data-toggle="modal" data-target="#about">Ayuda</a>
                            @break
                        @else {{--  -}}
                            <a href="http://stock.diagnoslab.com.ar:3333/stock">Actualizar Stock</a>
                            <a href="http://stock.diagnoslab.com.ar:3333/pdp">Ver PDP</a>
                            <a href="http://stock.diagnoslab.com.ar:3333/movimientos" class="btn disabled" >Movimientos</a>
                            <a href="#" data-toggle="modal" data-target="#about">Ayuda</a>
                            @break
                        @endif
                    @case(3)
                        @if ($ip == "127.0.0.1") {{-- si esta en testing -}}
                            <a href="http://stocklab-web.test/stock">Actualizar Stock</a>
                            <a href="http://stocklab-web.test/pdp">Ver PDP</a>
                            <a href="http://stocklab-web.test/movimientos" class="btn disabled">Movimientos</a>
                            <a href="#" data-toggle="modal" data-target="#about">Ayuda</a>
                            @break
                        @else {{--  -}}
                            <a href="http://stock.diagnoslab.com.ar:3333/stock">Actualizar Stock</a>
                            <a href="http://stock.diagnoslab.com.ar:3333/pdp">Ver PDP</a>
                            <a href="http://stock.diagnoslab.com.ar:3333/movimientos" class="btn disabled" >Movimientos</a>
                            <a href="#" data-toggle="modal" data-target="#about">Ayuda</a>
                            @break
                        @endif
                    @case(1)
                        @if ($ip == "192.168.10.241") {{-- si esta en la sede central -}}
                            <a href="http://192.168.10.241:3333/stock">Actualizar Stock</a>
                            <a href="http://192.168.10.241:3333/pdp">Ver PDP</a>
                            <a href="http://192.168.10.241:3333/movimientos" class="btn disabled">Movimientos</a>
                            <a href="#" data-toggle="modal" data-target="#about">Ayuda</a>
                            @break
                        @else 
                            @if ($ip == "127.0.0.1") {{-- si esta en testing -}}
                                <a href="http://stocklab-web.test/stock">Actualizar Stock</a>
                                <a href="http://stocklab-web.test/pdp">Ver PDP</a>
                                <a href="http://stocklab-web.test/movimientos" class="btn disabled">Movimientos</a>
                                <a href="#" data-toggle="modal" data-target="#about">Ayuda</a>
                                @break 
                            @else {{-- si esta en otro lado, o en otra red que no sea la local -}}
                                <a href="http://stock.diagnoslab.com.ar:3333/stock">Actualizar Stock</a>
                                <a href="http://stock.diagnoslab.com.ar:3333/pdp">Ver PDP</a>
                                <a href="http://stock.diagnoslab.com.ar:3333/movimientos" class="btn disabled" >Movimientos</a>
                                <a href="#" data-toggle="modal" data-target="#about">Ayuda</a>
                                @break
                            @endif
                        @endif
                    @case(0)
                        <a href="http://stocklab-web.test/stock">Actualizar Stock</a>
                        <a href="http://stocklab-web.test/pdp">Ver PDP</a>
                        <a href="http://stocklab-web.test/movimientos" class="btn disabled">Movimientos</a>
                        <a href="#" data-toggle="modal" data-target="#about">Ayuda</a>
                        @break

                    @default
                        <a href="http://stock.diagnoslab.com.ar:3333/stock">Actualizar Stock</a>
                        <a href="http://stock.diagnoslab.com.ar:3333/pdp">Ver PDP</a>
                        <a href="http://stock.diagnoslab.com.ar:3333/movimientos" class="btn disabled" >Movimientos</a>
                        <a href="#" data-toggle="modal" data-target="#about">Ayuda</a>
                        @break
                @endswitch --}}
            </div>
        </div>
    </div>
</div>

<div class="modal fade" tabindex="-1" role="dialog" id="about">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">StockLab-Web 1.5</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body text-center">
          <h2>FiGo Desarrollos™</h2>
          {{-- <a href = "mailto: figo.desarrollos@gmail.com">figo.desarrollos@gmail.com</a> --}}
          <p>Contacto <br> figo.desarrollos@gmail.com</p>
          <p></p>
        </div>
      </div>
    </div>
  </div>

@endsection
