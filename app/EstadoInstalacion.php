<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EstadoInstalacion extends Model
{
    protected $table = 'estado_instalacion';

    public function instalacionEstadoInstalacion() {
        return $this->hasOne('App\InstalacionEstadoInstalacion','id_estado_instalacion');
    }
}
