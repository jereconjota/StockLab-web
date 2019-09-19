@extends('layouts.app')

@section('title','Actualizar Stock')

@section('content')    
        <header class="container">
        <nav>
        <img src="/img/diagnosdahinten.png" alt="logo diagnos">
        </nav>
        </header>
        
        <div class="container">
        <div class="row">
                <div class="col-md-3 card">
                        <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Sector
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="#">Action</a>
                                        <a class="dropdown-item" href="#">Another action</a>
                                        <a class="dropdown-item" href="#">Something else here</a>
                                </div>
                        </div>
                        <div class="list-group">
                                <a href="#" class="list-group-item list-group-item-action">
                                Cras justo odio
                                </a>
                                <a href="#" class="list-group-item list-group-item-action">Dapibus ac facilisis in</a>
                                <a href="#" class="list-group-item list-group-item-action">Morbi leo risus</a>
                                <a href="#" class="list-group-item list-group-item-action">Porta ac consectetur ac</a>
                                <a href="#" class="list-group-item list-group-item-action" tabindex="-1" aria-disabled="true">Vestibulum at eros</a>
                        </div>
                </div>
        
                <div class="col-md-9 card">
                <table class="table">
                <thead class="thead-light">
                <tr>
                        <th scope="col">#</th>
                        <th scope="col">First</th>
                        <th scope="col">Last</th>
                        <th scope="col">Handle</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                        <th scope="row">1</th>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>@mdo</td>
                </tr>
                <tr>
                        <th scope="row">2</th>
                        <td>Jacob</td>
                        <td>Thornton</td>
                        <td>@fat</td>
                </tr>
                <tr>
                        <th scope="row">3</th>
                        <td>Larry</td>
                        <td>the Bird</td>
                        <td>@twitter</td>
                </tr>
                </tbody>
                </table>
                </div>
        </div>
        </div>

@endsection

