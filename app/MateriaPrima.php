<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MateriaPrima extends Model
{
    //
    protected $table='materias_primas';

    protected $guarded=['id','created_at','updated_at'];

    public function matprove()
    {
        return $this->belongsToMany(\App\Proveedor::class, 'mat_prove', 'id_materias_primas', 'id_proveedor');
    }

}
