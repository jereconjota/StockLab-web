<?php

namespace StockLab;

use Illuminate\Database\Eloquent\Model;
use StockLab\insumo;

class Insumo extends Model
{
    protected $table = 'insumo';

    public function getRouteKeyName()
        {
            return 'slug';
        }
}