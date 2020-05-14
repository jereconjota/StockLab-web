<?php

namespace StockLab;

use Illuminate\Database\Eloquent\Model;

class Movimiento extends Model
{
    protected $table = 'movimiento';

    public function getIsObservacionAttribute($value)
    {
        $this->attributes['is_observacion'] = strtolower($value);
    }
    protected $appends = ['is_observacion'];
}