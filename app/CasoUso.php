<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CasoUso extends Model
{
    protected $table = 'caso_uso';

    public function modulo() {
        return $this->belongsTo('\App\Modulo','id_modulo');
    }

    public function privilegio() {
        return $this->hasOne('App\Privilegio','id_caso_uso','id');
    }

    public function roles() {
        return $this->belongsToMany(Rol::class);
    }

    static function getCUPorModuloYRol($idModulo, $idRol) {
        $result = \DB::table('privilegio as p')
            ->join('caso_uso as cu', 'p.id_caso_uso', '=', 'cu.id')
            ->join('modulo as m', 'cu.id_modulo', '=', 'm.id')
            ->where('p.id_rol', '=', $idRol)
            ->where('m.id', '=', $idModulo)
            ->select('cu.id', 'cu.caso_uso_nombre', 'cu.orden', 'cu.ruta', 'cu.icono','cu.id_modulo')
            ->orderBy('cu.orden', 'ASC')
            ->get();

        return $result;
    }
}
