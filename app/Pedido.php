<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    
    protected $table = 'pedidos';

    public function user()
    {
        return $this->belongsTo('App\User');
    }


    public function relacion()
    {
        return $this->hasOne('App\Relacion');
    }

}
