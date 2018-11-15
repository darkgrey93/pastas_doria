<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    //
    protected $table='estado';
    
    protected $guarded=['id','created_at','updated_at'];
}
