<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    protected $table = 'rol';

    public function privilegio() {
        return $this->hasOne('App\Privilegio','id_rol','id');
    }

    public function user() {
        return $this->hasMany('\App\User','id_rol','id');
    }

    public function casosUso() {
        return $this->belongsToMany(CasoUso::class);
    }
}
