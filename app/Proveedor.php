<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    //
    protected $table='proveedores';
    
    protected $guarded=['id','created_at','updated_at'];

    public function pedido()
    {
        return $this->hasMany(\App\Pedido::class, 'id_proveedor', 'id');
    }

    public function matprove()
    {
        return $this->belongsToMany(\App\MateriaPrima::class, 'mat_prove', 'id_proveedores', 'id_materias_primas');
    }
}
