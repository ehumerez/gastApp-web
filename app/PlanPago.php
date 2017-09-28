<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PlanPago extends Model
{
    protected $table = 'plan_pago';

    public function pago() {
        return $this->belongsTo('App\Pago','id_pago');
    }

    public function estadoPago() {
        return $this->belongsTo('App\EstadoPago','id_estado_pago');
    }
}
