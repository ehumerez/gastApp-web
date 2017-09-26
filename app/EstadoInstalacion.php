<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EstadoInstalacion extends Model
{
    protected $table = 'estado_instalacion';

    public function instalacion() {
        return $this->hasMany('App\Instalacion','id_estado_instalacion');
    }

}
