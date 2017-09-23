<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InstalacionEstadoInstalacion extends Model
{
    protected $table = 'instalacion_estado_instalacion';

    protected $fillable = [
        'id_instalacion',
        'id_estado_instalacion'
    ];

    public function instalacion() {
        return $this->belongsToMany('App\Instalacion','id_instalacion');
    }

    public function estadoInstalacion() {
        return $this->belongsToMany('App\EstadoInstalacion','id_estado_instalacion');
    }
}
