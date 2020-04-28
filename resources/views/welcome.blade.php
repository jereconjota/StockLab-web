
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
                    @case("201.190.238.88")
                        <h4>Sede Km3</h4>
                        @break

                    @case("168.228.143.124")
                        <h4>Sede Rada Tilly</h4>
                        @break

                    @case("192.168.10.241")
                        <h4>Sede Central</h4>
                        @break

                    @case("127.0.0.1")
                        <h4>Testing</h4>
                        @break

                    @default
                        <h4>{{$ip}}</h4>
                @endswitch
               
                 {{-- @if ($ip === "201.190.238.88")
                    <h4>Sede Km3</h4>
                @else
                    @if ($ip === "168.228.143.124")
                    <h4>Sede Rada Tilly</h4>                        
                        @else
                            @if ($ip === "192.168.10.241")
                            <h4>Sede Rada Tilly</h4> 
                            @endif
                    @endif
                @endif  --}}

            </div>

            <div class="links">
                <a href="http://stocklab-web.test/stock">Actualizar Stock</a>
                <a href="http://stocklab-web.test/pdp">Ver PDP</a>
                {{-- <a href="http://stocklab-web.test/movimientos">Movimientos</a> --}}
                <a href="#" data-toggle="modal" data-target="#about">Ayuda</a>
            </div>
        </div>
    </div>
</div>

<div class="modal" tabindex="-1" role="dialog" id="about">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">StockLab-Web 1.0</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p class="text-center">FiGo Desarrollos™<br>
            <a href = "mailto: figo.desarrollos@gmail.com">figo.desarrollos@gmail.com</a>
            </p>
        </div>
      </div>
    </div>
  </div>

@endsection
