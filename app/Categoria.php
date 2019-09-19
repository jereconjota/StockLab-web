<?php

namespace StockLab;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $table = 'categoria';

    public function getRouteKeyName()
        {
            return 'slug';
        }
}