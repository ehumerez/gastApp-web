<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Privilegio extends Model
{
    protected $table = 'privilegio';

    protected $fillable = ['id_rol','id_caso_uso'];

    public function rol() {
        return $this->belongsToMany('App\Rol','id_rol');
    }

    public function casoUso() {
        return $this->belongsToMany('App\CasoUso','id_caso_uso');
    }
}
