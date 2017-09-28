<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pago extends Model
{
    protected $table = 'pago';

    public function instalacion() {
        return $this->belongsTo('App\Instalacion','id_instalacion');
    }

    public function planPago() {
        return $this->hasMany('App\Instalacion','id_pago','id');
    }

    public function estadoPago() {
        return $this->belongsTo('App\EstadoPago','id_estado_pago');
    }

    public function cliente() {
        return $this->belongsTo('App\Persona','id_pago');
    }

}
