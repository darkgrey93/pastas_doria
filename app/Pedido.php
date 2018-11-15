<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    //
    protected $table='pedido';
    
    protected $guarded=['id','created_at','updated_at'];

    public function materia_prima()
    {
        return $this->belongsTo(\App\MateriaPrima::class, 'id_materia_prima', 'id');
    }
    public function estado()
    {
        return $this->belongsTo(\App\Estado::class, 'id_estado', 'id');
    }
}
