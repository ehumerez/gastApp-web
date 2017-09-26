<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoriaInstalacion extends Model
{
    protected $table = 'categoria_instalacion';

    public function instalacion() {
        return $this->hasMany('App\Instalacion','id_categoria_instalacion');
    }
}
