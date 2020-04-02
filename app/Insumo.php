<?php

namespace StockLab;

use Illuminate\Database\Eloquent\Model;
// use StockLab\insumo;

class Insumo extends Model
{
    protected $table = 'insumo';
    protected $primaryKey = 'Id_Insumo';

    protected $fillable = [
        'Id_Insumo','Nombre_Insumo',
    ];
    
    // /**
    //  * Get the route key for the model.
    //  *
    //  * @return string
    //  */
    // public function getRouteKeyName()
    //     {
    //         return 'Nombre_Insumo';
    //     }
}