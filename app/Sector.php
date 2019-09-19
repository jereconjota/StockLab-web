<?php

namespace StockLab;

use Illuminate\Database\Eloquent\Model;

class Sector extends Model
{
    protected $table = 'sector';

    public function getRouteKeyName()
        {
            return 'slug';
        }

}