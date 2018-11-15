<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    //
    protected $table='producto';
    
    protected $guarded=['id','created_at','updated_at'];
}
