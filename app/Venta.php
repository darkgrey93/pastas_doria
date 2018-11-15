<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    //
    protected $table='ventas';
    
    protected $guarded=['id','created_at','updated_at'];

    public function producto()
    {
        return $this->belongsTo(\App\Producto::class, 'id_producto', 'id');
    }
    public function cliente()
    {
        return $this->belongsTo(\App\Cliente::class, 'id_cliente', 'id');
    }
}
