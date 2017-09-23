<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Instalacion extends Model
{
    protected $table = 'instalacion';

    public function instalacionEstadoInstalacion() {
        return $this->hasOne('App\InstalacionEstadoInstalacion','id_instalacion');
    }

    public function medidor() {
        return $this->hasOne('App\Medidor','id_instalacion','id');
    }
}
