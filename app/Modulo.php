<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Modulo extends Model
{
    protected $table = 'modulo';

    public function casoUso() {
        return $this->hasMany('\App\CasoUso','id_modulo','id');
    }

    static function getModulosPorRol($idRol) {
        $result = \DB::table('privilegio as p')
            ->join('caso_uso as cu', 'p.id_caso_uso', '=', 'cu.id')
            ->join('modulo as m', 'cu.id_modulo', '=', 'm.id')
            ->where('p.id_rol', '=', $idRol)
            ->select('m.id', 'm.modulo_nombre', 'm.es_enlace', 'm.icono', 'm.ruta', 'm.orden')
            ->groupBy('m.id')
            ->groupBy('m.modulo_nombre')
            ->groupBy('m.es_enlace')
            ->groupBy('m.icono')
            ->groupBy('m.ruta')
            ->groupBy('m.orden')
            ->orderBy('m.orden', 'ASC')
            ->get();

        return $result;
    }

    static function esCUActualPorRUTA($pRuta) {

        $result = (\Request::is($pRuta)
            || \Request::is($pRuta . '/*')
            || \Request::is($pRuta . '/*/*')
        );

        return $result;

    }
}
