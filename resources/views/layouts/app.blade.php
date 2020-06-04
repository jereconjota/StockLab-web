<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>StockLab  - @yield('title') </title>

    <link rel="shortcut icon" href="{{ asset('img/iconoStockLab.png') }}">
    <title>{{ config('app.name', 'StockLab') }}</title>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Scripts -->
    {{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    {{-- <link rel="stylesheet" type="text/css" href="{{ asset('DataTables/datatables.min.css') }}" /> --}}
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/autofill/2.3.5/css/autoFill.bootstrap4.min.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.2/css/buttons.bootstrap4.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/colreorder/1.5.2/css/colReorder.bootstrap4.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/fixedcolumns/3.3.1/css/fixedColumns.bootstrap4.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/fixedheader/3.1.7/css/fixedHeader.bootstrap4.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/keytable/2.5.2/css/keyTable.bootstrap4.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.5/css/responsive.bootstrap4.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/rowgroup/1.1.2/css/rowGroup.bootstrap4.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/rowreorder/1.2.7/css/rowReorder.bootstrap4.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/scroller/2.0.2/css/scroller.bootstrap4.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/searchpanes/1.1.1/css/searchPanes.bootstrap4.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/select/1.3.1/css/select.bootstrap4.css"/>
    <link rel="stylesheet"  type="text/css" href="{{ asset('css/app.css') }}" rel="stylesheet">
    @yield('styles')
    <style>
        body{
            /* background: #dcdcdc; */
            height: 100vh;

        }
    </style>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="#">
                    <img src="img/diagnosdahinten.png" height="30" class="d-inline-block align-top" alt="Laboratorio Diagnos">
                </a>

                <div class="d-flex w-100 order-0">
                    <div class="w-100">
                        {{-- <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav">
                            <span class="navbar-toggler-icon"></span>
                        </button> --}}
                    </div>
                    <a class="navbar-brand text-center w-100" href="{{ url('/home') }}"><img src="img/iconoStockLab.png" height="30" class="" alt=""></a>
                    <span class="w-100"></span>
                </div>

                {{-- <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button> --}}

                {{-- <div class="collapse navbar-collapse" id="navbarSupportedContent"> --}}
                    <!-- Left Side Of Navbar -->
                    {{-- <ul class="navbar-nav mr-auto">

                    </ul> --}}

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Ingresar') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <!-- <a class="nav-link" href="{{ route('register') }}">{{ __('Registrarse') }}</a> -->
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Cerrar Sesión') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                {{-- </div> --}}
            </div>
        </nav>

    {{-- content --}}
    <div class="container my-3">
        @include('flash-message')
        @yield('content')
    </div>
    
    </div>
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script type="text/javascript" src="{{ asset('DataTables/datatables.min.js') }}" ></script> --}}
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/js/bootstrap.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/autofill/2.3.5/js/dataTables.autoFill.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/autofill/2.3.5/js/autoFill.bootstrap4.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.2/js/dataTables.buttons.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.bootstrap4.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.colVis.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.flash.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.html5.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/colreorder/1.5.2/js/dataTables.colReorder.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/fixedcolumns/3.3.1/js/dataTables.fixedColumns.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/fixedheader/3.1.7/js/dataTables.fixedHeader.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/keytable/2.5.2/js/dataTables.keyTable.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.5/js/dataTables.responsive.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/rowgroup/1.1.2/js/dataTables.rowGroup.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/rowreorder/1.2.7/js/dataTables.rowReorder.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/scroller/2.0.2/js/dataTables.scroller.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/searchpanes/1.1.1/js/dataTables.searchPanes.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/searchpanes/1.1.1/js/searchPanes.bootstrap4.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/select/1.3.1/js/dataTables.select.js"></script>
    @yield('script')
</body>
</html>
