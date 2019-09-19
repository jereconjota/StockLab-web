<?php

namespace StockLab\Http\Controllers;
use StockLab\Http\Controllers\Controller;

class PruebaController extends Controller{
    public function prueba($param){
        return 'Hola desde el controlador y recibi este parametro: '. $param;
    }

}