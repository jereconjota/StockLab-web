<?php

namespace StockLab\Http\Controllers;

use Illuminate\Http\Request;
use StockLab\Insumo;

class editSupplieController extends Controller
{
    public function supplieToEdit($id)
    {
        $supplie = Insumo::find($id);        
        return $supplie;
    }
}
