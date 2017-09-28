<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EstadoPago extends Model
{
    protected $table = 'estado_pago';

    public function pago() {
        return $this->hasMany('App\Pago','id_estado_pago','id');
    }

    public function planPago() {
        return $this->hasMany('App\PlanPago','id_estado_pago','id');
    }
}
